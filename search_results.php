<?php
include_once("connection.php");
//capture search term and remove spaces at its both ends if there is any
$searchTerm = trim($_GET['keyname']);

//check whether the name parsed is empty
if($searchTerm == "")
{
	echo "Enter name you are searching for.";
	exit();
}

//MYSQL search statement
$query = "SELECT * FROM info_package WHERE author LIKE '%$searchTerm%'";

$results = mysql_query($query);

/* check whethere there were matching records in the table
by counting the number of results returned */

	$counter=mysql_num_rows($results);
	
	echo '<b>'. $counter;
	echo '</b>';
	echo " results found:";
	
	echo'<br/><br/>';

if(mysql_num_rows($results) >= 1)
{
	$output = "";
	while($row = mysql_fetch_array($results))
	{
		//echo '<b>';
		$output .= "Author: " . $row['author'] . "<br />";
		$output .= "Title: " . $row['title'] . "<br />";
		$output .= "Place of publication: " . $row['place_pub'] . "<br />";
		$output .= "Publisher: " . $row['publisher'] . "<br />";
		$output .= "Call Number: " . $row['call_no'] . "<br /><br /><br/ > ";
		
	}
	
	echo $output;
	
}
else
	echo "There was no matching record for the name " . $searchTerm;
?>