<?php
require("template.php");
require("dbinfo.php");


head();

$query = mysql_query("SELECT * FROM professor ORDER BY profFName ASC");

echo "<br><br>

<table width=800px bgcolor=#cacaca>
<tr bgcolor=#FFFFFF>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Office</td>
	<td>E-Mail</td>
	
</tr>
";

$bgcolor1 = "#c1c1c1";
$bgcolor2 = "#f1f1f1";

$count = 0;

while($row = mysql_fetch_array($query))
{
	if($count % 2 == 1)
	{
		$bgcolor = $bgcolor1;
	}
	else
	{
		$bgcolor = $bgcolor2;
		
	}
	echo "<tr bgcolor=$bgcolor>";
	
		echo "<td>$row[profFName]</td>";
		echo "<td>$row[profLName]</td>";
		echo "<td>$row[profOffice]</td>";
		echo "<td>$row[profEmail]</td>";
		echo "</tr>";
	
	$count = $count+1;
}

echo "</table>";
?>