<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "root";
$mysql_database = "saloon";

$bd = mysql_connect($mysql_hostname,$mysql_user, $mysql_password) or
die ("Something went wrong while connecting");
mysql_select_db($mysql_database,$bd) or
die(mysql_error());
//die ("Something went wrong while selecting db");

?>