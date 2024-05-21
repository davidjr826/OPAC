<?php
$tbl_name="users"; // Table name
/*$host="localhost"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect to server ");
mysql_select_db("$db_name")or die("cannot select DB");
*/
include_once("connection.php");
$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);

$rows=mysql_fetch_array($result);
@$counter=$rows['counter'];

// if have no counter value set counter = 1
if(empty($counter)){
$counter=1;
$sql1="INSERT INTO $tbl_name(counter) VALUES('$counter')";
$result1=mysql_query($sql1);
}

echo "You 're visitors No. ";
echo $counter;

// count more value
$addcounter=$counter+1;
$sql2="update $tbl_name set counter='$addcounter'";
$result2=mysql_query($sql2);

mysql_close();
?>