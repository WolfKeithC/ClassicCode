<?php
$url='10.101.50.225:3306';
$username='keith';
$password='Disney1234';
$conn=mysqli_connect($url,$username,$password,"secrets");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>