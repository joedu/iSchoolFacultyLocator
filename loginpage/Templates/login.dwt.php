<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>iSchool Faculty Locator Login</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
<img src="../header_bg.png" width="979" height="239" />
<div align="center">
<form name="form1" method="POST">
<table width="400" border="0" cellspacing="0" cellpadding="3">
<tr>
<td width="100">Username:</td>
<td><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td width="100">Password:</td>
<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td width="100"> </td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>
</div>
</body>
</html>

 <?php 
 // Connects to your Database 

 mysql_connect("68.81.93.94", "username", "password") or die(mysql_error()); 

 mysql_select_db("users") or die(mysql_error()); 