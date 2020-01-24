<?php
include_once 'php_calendar.php';
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Calendar</title>
 <link rel="stylesheet" href="calendar.css">
 </head>
<body>
<?php
/* sample usages */


$query = $_SERVER['QUERY_STRING'];

$mL = array(
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July ',
    'August',
    'September',
    'October',
    'November',
    'December',
);

parse_str($query, $output);
echo '<h2>' . $mL[$output['month'] - 1] . ' ' . $output['year'] . '</h2>';

echo draw_calendar($output['month'],$output['year']);
?>
</body></html>