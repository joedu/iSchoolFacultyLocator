<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_username = "localhost";
$database_username = "userlogin";
$username_username = "admin";
$password_username = "Ch4ng3m3";
$username = mysql_pconnect($hostname_username, $username_username, $password_username) or trigger_error(mysql_error(),E_USER_ERROR); 
?>