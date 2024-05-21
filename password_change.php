<?php
$connection=mysql_connect("localhost","root","");
$db=mysql_select_db("opac",$connection);
$result = mysql_query("select password from users where username=$_POST['username']");
if(!$result)
{
echo "oops! The Username you entered does not exist";
}
else
if($_POST['password']!= mysql_result($result, 0))
{
echo "You entered an incorrect password";
}
else if($_POST['newpassword']!=$_POST['confirmnewpasssword'])
{
echo "The new password and confirm new password fields must be the same";
}
else
$sql=mysql_query(UPDATE passwordtable SET password=$_POST['newpassword'] where username=$_POST['username']);
if($sql)
{
echo "Congratulations You have successfully changed your password";
}
?>