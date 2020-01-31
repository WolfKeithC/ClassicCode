<?php
/* draws a calendar */
function draw_calendar($budgetId,$calendarType,$month,$year){

	$url='localhost:3306';
	$username='root';
	$password='wolftrain';
	$conn=mysqli_connect($url,$username,$password,"wolfbudget");
	if(!$conn){
	die('Could not Connect My Sql:' .mysql_error());
	}	

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';

		/* add in the day number */
		$calendar.= '<div class="day-number">'.$list_day.'</div>';
		$proc = "CALL showmonthbudget (" . $budgetId . ", " .$calendarType . ", " . $year . ", " . $month . ", " . $list_day .");";
		
		mysqli_more_results($conn);

		$result = mysqli_query($conn,$proc, MYSQLI_USE_RESULT);
		/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
		if ($result) {
			$calendar.= '<table>';
			while($row = mysqli_fetch_array($result)) {
				$calendar.= '<tr><td>' . $row["Description"] . '</td><td>' . $row["Amount"] . '</td></tr>';
			}
			mysqli_more_results($conn);
			mysqli_next_result($conn);
			$calendar.= '</table>';
			
		} else {
			$calendar.= '<p>CALL failed: (' . $conn->errno . ') ' . $conn->error . '</p>';
		}
		$result = array();
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;
	mysqli_close($conn); 

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
?>
