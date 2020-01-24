<?php
echo (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$protocol = (isset($_SERVER['HTTPS']) ? "https://" : "http://");
$host = $_SERVER['HTTP_HOST'];
$port = $_SERVER['SERVER_PORT'];
$path = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];

echo '<br />';
echo $protocol;
echo '<br />';
echo $host;
echo '<br />';
echo $port;
echo '<br />';
echo $path;
echo '<br />';
echo $query;

parse_str($query, $output);
echo '<br />';
echo 'Year: ' . $output['year'];
echo '<br />';
echo 'Month: ' . $output['month'];
echo '<br />';
echo 'Account: ' . $output['account'];

?>