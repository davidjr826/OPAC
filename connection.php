<?php
//create a database connection
$connect=mysqli_connect("localhost","root","");
/*if (!$connect)
{
	echo "connection failed";
}
else
{
	echo "connection established";
}
*/

$select=mysqli_select_db($connect,"opac");  
?> 

