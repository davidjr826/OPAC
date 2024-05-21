<?php
include_once('connection.php');
/*
if(isset($_POST['delete']))
{
$id=$_POST['id'];
//echo $id;
$mysql_select=mysql_query("SELECT * FROM info_package");
$execute=mysql_fetch_array($mysql_select);
$delete=$execute['id'];
$query="delete from info_package  where id = '$delete'";
$retval = mysql_query( $query );
if(!$retval)
{
  die('Could not update data: '. mysql_error());
}else{
//echo'deleted successfuly!';
header('location:view.php');
}
}
*/
 $id=$_REQUEST['id']; 

 $query="DELETE FROM info_package WHERE id='".$id."'";
	
	  if(!mysql_query($query))
	  {
	  header("location:view.php");
	  //die ("An unexpected error occured while <b>deleting</b> the record, Please try again!");
	  }
	  else
	 {
	  //echo "Record ".$id." removed successfully!";
	  header("location:view.php");
	  }
mysql_close();
?>