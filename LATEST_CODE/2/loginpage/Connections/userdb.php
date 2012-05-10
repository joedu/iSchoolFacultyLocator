<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_userdb = "68.81.93.94";
$database_userdb = "users";
$username_userdb = "admin";
$password_userdb = "Ch4ng3m3";
$userdb = mysql_pconnect($hostname_userdb, $username_userdb, $password_userdb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>