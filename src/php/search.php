
<html>
<head>
	<title>iSchool Faculty Locator - Home</title>
	<link rel="stylesheet" href="../../style.css" />
</head>
<body id="main_body" >

    <div id="form_container">
         <a href="../../index.php"><img src="../../banner.jpg" alt=""></a>
            <br />
			<center><h2>iSchool Faculty Locator Search Results</h2></center>
			<center><h3>Detailed information about your search below.</h3></center>
        <h1>Add Faculty Travel Information</h1> 
        <?php

  // Get the search variable from URL

  $var = @$_GET['q'] ;
  $trimmed = trim($var); //trim whitespace from the stored variable

// rows to return
$limit=10; 

// check for an empty string and display a message.
if ($trimmed == "")
  {
  echo "<p>Please enter a search...</p>";
  exit;
  }

// check for a search parameter
if (!isset($var))
  {
  echo "<p>We dont seem to have a search parameter!</p>";
  exit;
  }

//connect to your database ** EDIT REQUIRED HERE **
mysql_connect("localhost","root","Pr0tect0r#1"); //(host, username, password)

//specify database ** EDIT REQUIRED HERE **
mysql_select_db("project") or die("Unable to select database"); //select which database we're using

// Build SQL Query  
$query = "select * from professor where profFName OR profLName like \"%$trimmed%\"  
  order by profLName"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);

 

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
  {
  //echo "<h2>Results</h2>";
  echo "<p>Sorry, your search: &quot;" . $trimmed . "&quot; returned zero results</p>";

// google
 echo "<p><a href=\"http://www.google.com/search?q=" 
  . $trimmed . "\" target=\"_blank\" title=\"Look up 
  " . $trimmed . " on Google\">Click here</a> to try the 
  search on google</p>";
  }

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die("Couldn't execute query");

// display what the person searched for
//echo "<p>You searched for: &quot;" . $var . "&quot;</p>";

// begin to show results set
//echo "<h2>Results</h2><br>";
#$count = 1 + $s ;

// now you can display the results returned
  while ($row= mysql_fetch_array($result)) {
  #$title = "First name ".$row["profFName"];
  #$title = "Last name ".$row["profLName"];
  
  echo $row["profFName"]."&nbsp;".$row["profLName"]."&nbsp;".$row["profTitle"]."<br>".$row["profPhone"]."<br>".
  $row["profBldg"]."&nbsp;"."<br>".$row["profOffice"]."&nbsp;".$row["profPho"]."<br>".
  "<a href='".$row["profEmail"]."'>Email Me</a><br><br><hr>";

 # echo "$count.)&nbsp;$title" ;
  $count++ ;
  }

$currPage = (($s/$limit) + 1);

//break before paging
  echo "<br />";

  // next we need to do the links to other results
  if ($s>=1) { // bypass PREV link if s is 0
  $prevs=($s-$limit);
  print "&nbsp;<a href=\"$PHP_SELF?s=$prevs&q=$var\">&lt;&lt; 
  Prev 10</a>&nbsp&nbsp;";
  }

// calculate number of pages needing links
  $pages=intval($numrows/$limit);

// $pages now contains int of pages needed unless there is a remainder from division

  if ($numrows%$limit) {
  // has remainder so add one page
  $pages++;
  }

// check to see if last page
  if (!((($s+$limit)/$limit)==$pages) && $pages!=1) {

  // not last page so give NEXT link
  $news=$s+$limit;

  //echo "&nbsp;<a href=\"$PHP_SELF?s=$news&q=$var\">Next 10 &gt;&gt;</a>";
  }

$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
  //echo "<p>Showing results $b to $a of $numrows<br><br><a href='../index.php'>Go Back</a></p>";
  echo "<a href='../../index.php'>Go Back</a>";
 #echo 'First Name: '.$row["profFName"];'Last Name: '.$row["profLName"];'First Name: '.$row["profTitle"];
  
  
  
?>
    </div>
</body>
</html>