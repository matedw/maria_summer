<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connq = "mattedwdb.cfky1rkja5ao.eu-west-1.rds.amazonaws.com";
$database_connq = "adventCal";
$username_connq = "mattedwauser";
$password_connq = "Bananas777";
$connq = mysql_pconnect($hostname_connq, $username_connq, $password_connq) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8',$connq);
?>