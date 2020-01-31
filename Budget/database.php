<?php
$url='localhost:3306';
$username='root';
$password='wolftrain';
$conn=mysqli_connect($url,$username,$password,"wolfbudget");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>