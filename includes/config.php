<?php

$mysql_hostname = "https://threesixzero-spasaloon.rhcloud.com/phpmyadmin/";
$mysql_user = "adminsCZL1Nq";
$mysql_password = "kqQyuytgeVGZ";
$mysql_database = "threesixzero";

$bd = mysql_connect($mysql_hostname,$mysql_user, $mysql_password) or
die ("Something went wrong while connecting");
mysql_select_db($mysql_database,$bd) or
die(mysql_error());
//die ("Something went wrong while selecting db");

?>
