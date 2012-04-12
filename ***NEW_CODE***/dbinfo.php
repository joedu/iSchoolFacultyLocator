<?

$connection=mysql_connect ("localhost", "root", "");
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db("project", $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
?>