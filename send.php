<?php
$db_connection=mysql_connect("localhost", "root", "");
if(!$db_connection)
{
	die("No database connection: ". mysql_error());
}
//Select a database to use
$db_select=mysql_select_db("opac",$db_connection);
if(!$db_connection)
{
	die("Database selection Failed". mysql_error());
}

$sql="INSERT INTO Persons (FirstName, LastName, Age)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "1 record added";

mysqli_close($db_connection);
?>