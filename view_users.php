<?php
session_start();
$user = $_SESSION["username"];
?>
<?php
if(!$user)
{
	header("Location: index.php");
}
else{
?>
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
  	<td colspan="5" id="dateformat" height="25"><font color="blue" align="rigth"> <?php echo "Welcome, ".'<b>'.$user.''.'</b>';?></font>
  	  <div align="right">Today is:
	  <strong>
  	    <font color="blue" align="rigth">
  	    <script language="JavaScript" type="text/javascript">
		
      document.write(TODAY);</script>	
	  </strong>
	  </font>
      </div>
    </td>
  </tr>
 <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td colspan="5" valign="top" bgcolor="#E6F3FF">
	<center>
	<form action="view_search_while.php" method="get">
  <br/>
  <div align="right"><i>Enter your search keyword:</i>
      <input type="text" name="query" placeholder="Search here"/>
	  <input type="submit" value="Search" />
  </div>
  </label>
</form>
</center>
<?php
	  echo'<center>';
include_once("connection.php");

$mysql_select="SELECT * FROM users";
$result=mysql_query($mysql_select);
//$rows= mysql_fetch_array($result);
echo'<br/>';
echo'<table border="1" bordercolor="blue" style="border-style:collapse;">';
echo'<tr>';
echo'<td bgcolor="#CCFF99"> <b>ID</b> </td>';
echo'<td bgcolor="#CCFF99"> <b>Username</b> </td>';
echo'<td bgcolor="#CCFF99"> <b>Role </b></td>';
echo'<td colspan="2" align="center" bgcolor="#CCFF99">  <b>Actions </b></td>';
echo'</tr>';
while($rows= mysql_fetch_array($result))
{
echo'<tr>';
echo'<td>'. $rows['id'].'</td>';
echo'<td>'. $rows['username'].'</td>';
echo'<td>'. $rows['user_level'].'</td>';
echo'<td bgcolor="blue">'.'<input type="submit" value="Change Role" name="update"/>'.'</td>';
echo'<td bgcolor="red">'.'<input type="submit" value="Remove" name="delete"/>'.'</td>';
echo'</tr>';
}
echo'</table>';
echo'</center>';
?>
      <table width="200" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <center>
        <p><a href="add_user.php">Add New User</a></p>
        <p><a href="adminloggedin.php">Go Back</a>        </p>
      </center>
       <br />
      &nbsp;<br />
      &nbsp;<center>
        </center><br />
      &nbsp;<br /> 	<br />
      &nbsp;<br />
      &nbsp;<br />
      <br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br /></td></tr>
  <tr>
    <td colspan="5"><center>
      <strong>Copyrights (c) Deus Francis & SUA 2013</strong>.
    </center>
    <p><center>
      <strong>All Rights Reserved.</strong>
    </center></p></td>
  </tr>
</table>
</body>
</html>
<?php
}
?>