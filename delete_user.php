<?php 
session_start();
?>
<?php
include "connection.php";

if (isset($_POST['submit']))
{
$query_delete = "DELETE FROM info_package WHERE id = '" . $_POST['id'] ."';";
//echo $_POST['id'];
$result_delete = mysql_query($query_delete);
echo "Account has been deleted! You are being sent to the admin!"."<br>";
die();
}
else
{
?>
<h1>Admin </h1>
<p>Are you sure you want to delete this user's account?<br></p>
<form action="delete_user.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<input type="submit" name="submit" value="Yes"> &nbsp; 
<input type="button" value=" No " onClick="history.go(-1);">
</form>
<?php
}
?>
</body>
</html>
