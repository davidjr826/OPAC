<?php
include_once("session.php");
 ?>
 <?php
 include_once("connection.php");
		if (isset($_POST['submit']))
		{
		//check fields
		$username = ($_POST['username']);
		$oldpassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
		$repeatnewpassword = $_POST['repeatnewpassword'];
		//check pass against db
		$queryget = mysql_query("SELECT password FROM users WHERE username='$username'") or die("Query didn't work");   
		$row = mysql_fetch_array($queryget);
 		$oldpassworddb = $row['password'];
		//check pass
		echo $row['password'];
		echo '<br/>';
		echo $oldpassword;
		
		if (!($oldpassword==$oldpassworddb))
		{
		header("location:error_change_password1.php");
		//check twonew pass
	 }
		else if ($newpassword==$repeatnewpassword)
		{
				$querychange = mysql_query("UPDATE users SET password='$newpassword' WHERE username='$username'");
				//session_destroy();
				die("Your pass has benn changed.<a href='index.php'>Return</a> to the main page");
		}
		else
				header("location:error_change_password2.php");
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
  	<td colspan="5" id="dateformat" height="25">&nbsp;&nbsp;
	  <font color="blue" align="rigth"> 
	  <?php //echo "Hallo ".'<b>'.$user.'.'.'</b>';?></font> Today is: 

  	    <script language="JavaScript" type="text/javascript">
      document.write(TODAY);</script>	
      </td>
  </tr>
 <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td colspan="5" valign="top" bgcolor="#E6F3FF">
	<table align="left" border="0" cellspacing="0" cellpadding="0" width="188" id="navigation">
        <tr>
          <td width="188"><a href="userloggedin.php" class="navText">Home</a></td>
        </tr>
        <tr>
          <td width="188"><a href="view.php" class="navText">View records </a></td>
        </tr>
        <tr>
          <td width="188"><a href="simplesearch_form.php" class="navText">Visit OPAC </a></td>
        </tr>
		<tr>
          <td width="188"><a href="logout.php" class="navText">Logout</a></td>
        </tr>
</table>
 	
	<table width="465" height="224" border="0" align="center">
		
	<form action="error_change_password2.php" method="post">
      <br/>
	   <tr>
        <td width="65" height="53">Username</td>
        <td width="212"><input type="text" name="username" size="30" required/></td>
      </tr>
	  <tr>
        <td height="43">Current Password</td>
        <td><input type="password" name="oldpassword" size="30" required/></td>
      </tr>
      <tr>
        <td height="48">New Password</td>
        <td><input type="password" name="newpassword" size="30" required/></td>
      </tr>
	  <tr>
        <td height="42">Re-Enter New Password</td>
        <td><input type="password" name="repeatnewpassword" size="30" required/></td>
      </tr>
	   <tr>
        <td></td>
        <td><input type="submit" name="submit" size="size""10" value="Change Password" />
            <input type="reset" name="submit" size="size""10" value="Clear All" /></td>
      </tr>
	  <tr>
        <td colspan="2"><font color="red"><b>Your new passwords aren't matching. Please re-enter them corrently: </b></font></td>
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
</table>
</body>
</html>
