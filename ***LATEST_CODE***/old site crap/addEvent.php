<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" media="all">
        <title></title>
    </head>
    <body id="main_body" >

        <div id="form_container">
            <a href="index.php"><img src="banner.jpg" alt=""></a>
            <br />
			<center><h2>Welcome to the Administrative Portal</h2></center>
			<center><h3>Please enter details below to add new faculty data.</h3></center>
        <h1>Add Faculty Travel Information</h1>
        <form method="post" action="addEvent.php">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" value="First Name" name="firstName" size="15"/></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" value="Last Name" name="lastName" size="15"/></td>
                </tr>
				<tr>
                    <td>Title:</td>
                    <td><input type="text" value="Title" name="title" size="15"/></td>
                </tr>
                <tr>
                    <td>Event:</td>
                    <td><input type="text" value="Event Name" name="event" size="30"/></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" value="Address" name="address" size="30"/></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="text" value="YYYY-MM-DD" name="date" size="30"/></td>
                </tr>
                
                <tr>
                    
                    <td colspan="2"><input type="submit" value="Add Info"/></td>
                </tr>
                <?php
                // put your code here
                if (isset($_POST['firstName'])) {
                    $dsn = 'mysql:host=localhost;dbname=project';
                    $username = 'root';
                    $password = 'Pr0tect0r#1';
                    $db = new PDO($dsn, $username, $password);
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $title = $_POST['title'];
                    $address = $_POST['address'];
                    $date = $_POST['date'];
                    $event = $_POST['event'];


                    $professors = 'INSERT INTO professor ' .
                            "(profID, profLName, profFName, profTitle)" .
                            "VALUES ('NULL','$lastName', '$firstName', '$title')";
                    
                    $markers = 'INSERT INTO markers ' .
                            "(id, name, address, type)" .
                            "VALUES ('NULL', '$event', '$address')";

                    //echo "$author</br>";

                    $events = $db->exec($markers);
                    $titles = $db->exec($professors);
                    

                    //foreach ($titles as $t) {
                    //    echo "$t[1], $t[0] <br />";
                    //}
                }
                ?>
                </body>
                </html>
