<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT id,m1,m3,m4,m5 FROM CSVTestData");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City</th>
    <th>Email id</th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["m1"]; ?></td>
    <td><?php echo $row["m3"]; ?></td>
    <td><?php echo $row["m4"]; ?></td>
    <td><?php echo $row["m5"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>