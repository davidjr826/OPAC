<?php
session_start();
$user = $_SESSION["username"];
?>
<?php
if(!$user)
{
	header("Location: index.php");
}
?>
<script type="text/javascript">
function delete_funct()
{
return Confirm("Item deleted"); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Jordan OPAC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_travel2.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
</head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td rowspan="2"><img src="mm_travel_photo.jpg" alt="Header image" width="382" height="127" border="0" /></td>
    <td height="63" colspan="2" id="logo" valign="bottom" align="center" nowrap="nowrap"><b>ONLINE LIBRARY CATALOGUE </b></td>
    <td width="328">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="2" id="tagline" valign="top" align="center">Jordan University </td>
	<td width="328">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="5" id="dateformat" height="25">&nbsp;&nbsp;
	<font color="blue" align="rigth"> <?php echo "Welcome ".'<b>'.$user.'.'.'</b>';?></font>
  	  <div align="right">
	   Today is: 
	   <font color="blue" align="rigth">
	   <strong>
  	    <script language="JavaScript" type="text/javascript">
      document.write(TODAY);</script>	
	  </strong>
	  </font>
      </div></td>
  </tr>
 <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td colspan="5" valign="top" bgcolor="#E6F3FF">
	<?php
	  echo'<center>';
include_once("connection.php");
$mysql_select="SELECT * FROM info_package ORDER BY id DESC LIMIT 0,1";
//$mysql_select="SELECT * FROM info_package id=$id";
$result=mysql_query($mysql_select);
$rows= mysql_fetch_array($result);
//
//$delete= $_POST['id'];
//$select=SELECT * FROM `myfield` ORDER BY `id` DESC LIMIT 0,1
if(isset($_GET['id']))
{
$delete = "DELETE FROM info_package WHERE id=$id ";
$deleted = mysql_query($delete);
}
 //
echo'<br/>';
echo'<table border="1" style="border-style:collapse;">';

echo'<tr>';
echo'<td bgcolor="#CCFF99"> <b>ID</b> </td>';
echo'<td bgcolor="#CCFF99"> <b>Author</b> </td>';
echo'<td bgcolor="#CCFF99"> <b>Title </b></td>';
echo'<td bgcolor="#CCFF99">  <b>ISBN Number</b> </td>';
echo'<td bgcolor="#CCFF99">  <b>Publication Year </b></td>';
echo'<td bgcolor="#CCFF99">  <b>Keywords </b></td>';
echo'<td bgcolor="#CCFF99">  <b>Call Number</b></td>';
echo'<td bgcolor="#CCFF99">  <b>Publisher </b></td>';
echo'<td bgcolor="#CCFF99">  <b>Publication Place </b></td>';
echo'<td colspan="2" align="center" bgcolor="#CCFF99">  <b> Actions </b> </td>';
echo'</tr>';

echo'<form action="view_search.php" method="post">';
echo'<tr>';
echo'<td>'. $rows['id'].'</td>';
echo'<td>'. $rows['author'].'</td>';
echo'<td>'. $rows['title'].'</td>';
echo'<td>'. $rows['isbn_no'].'</td>';
echo'<td>'. $rows['date_pub'].'</td>';
echo'<td>'. $rows['keywords'].'</td>';
echo'<td>'. $rows['call_no'].'</td>';
echo'<td>'. $rows['publisher'].'</td>';
echo'<td>'. $rows['place_pub'].'</td>';
echo'<td bgcolor="blue">'.'<a href="edit_record.php"><input type="submit" value="Edit" name="edit"/></a>'.'</td>';
echo'<td bgcolor="red">'.'<a href="delete.php?id='.$rows['id'].'"><input type="button" value="Delete" style="decoration:none;"/></a>'.'</td>';


//echo '<input type="submit" value="Delete" name="delete"/></a>'.'</td>';
echo'</tr>';
echo'</form>';
echo'</table>';
echo'</center>';
?>
       <br />
      &nbsp;<br />
      &nbsp;<center>
	  <p><a href="registered_success.php">Go Back</a>        </p>
        </center>
      <p><br />
        &nbsp;<br /> 	
        <br />
        &nbsp;<br />
        &nbsp;<br />
        <br />	
        <img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
      &nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><br />
      </p></td></tr>
  <tr>
    <td colspan="5"><center>
      <strong>Copyrights (c) Deus Francis & SUA 2013</strong>.
    </center>
    <p><center>
      <strong>All Rights Reserved.</strong>
    </center></p>
	</td>
  </tr>
</table>
</body>
</html>
<?php
?>