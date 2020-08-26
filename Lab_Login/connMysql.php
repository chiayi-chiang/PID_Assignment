<?php

$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'phpmember';
//connect to mysql
$link = mysqli_connect($dbhost, $dbuser, $dbpass, "hw0807", 8889) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8");

?>