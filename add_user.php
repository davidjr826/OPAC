<?php
include_once("session.php");
?>
<?php
if(!$user)
{
	header("Location: index.php");
}
?>
<?php
//create a database connection
$error_password_unmatching="Sorry your Passwords do not Match, Please re-enter them correctly";
$db_connection=mysql_connect("localhost", "root", "");
if(!$db_connection)
{
	die("No database connection: ". mysql_error());
}
//Select a database to use
$db_select=mysql_select_db("opac",$db_connection);
if(!$db_select)
{
	die("Database selection Failed". mysql_error());
}  
//include_once("connection.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$new_password=$_POST['new_password'];
	//$encrypted=$password;
	if(!($new_password==$password))
	{
		//echo "no match";
		header("Location:add_user_error.php");
	}
	else{
	$password = md5($password);
	$insert = mysql_query("INSERT INTO users(username,password)
	values('".$username."','".$password."')");
	//mysql_query($insert);
	mysql_close($db_connection);
	header("location:user_added_success.php");
	}
}
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
	<table align="left" border="0" cellspacing="0" cellpadding="0" width="170" id="navigation">
	
	<tr>
	<td>
		<strong>
        <h2>Managerial tasks</h2>
        <strong>
		</td>
		</tr>
        <tr>
          <td width="188"><a href="adminloggedin.php" class="navText">Home</a></td>
        </tr>
        <tr>
          <td width="188"><a href="view_users.php" class="navText">View All Users </a></td>
        </tr>
        <tr>
          <td width="188"><a href="simplesearch_form.php" class="navText">Visit OPAC </a></td>
        </tr>
		<tr>
          <td width="188"><a href="logout.php" class="navText">Logout</a></td>
        </tr>
</table>
 	
	<table width="578" height="177" border="0" align="center">
		
	<form action="add_user.php" method="post">
      <br/>
	  <tr>
        <td colspan="2"><p><h2>Enter the Login details for a new User: </h2></p></td>
        </tr>
	  <tr>
        <td width="89" height="44">Username</td>
        <td width="479"><input type="text" name="username" size="30" required/></td>
      </tr>
      <tr>
        <td height="50">Password</td>
        <td><input type="password" name="password" size="30" required/></td>
      </tr>
	  <tr>
        <td height="50">Re-enter Password</td>
        <td><input type="password" name="new_password" size="30" required/></td>
      </tr>
	   <tr>
        <td></td>
        <td><input type="submit" name="submit" size="size""10" value="Add User" />
            <input type="reset" name="submit" size="size""10" value="Clear All" /></td>
      </tr>
	  </form>
    </table> 	
	 
	<br />
  	&nbsp;<br />
  	&nbsp;<center>
    </center><br />
  	&nbsp;<br /> 	<br />
	&nbsp;<br />
	&nbsp;<br />
	<br/><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br /></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
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
