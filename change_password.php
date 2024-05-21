<?php
include_once("session.php");
?>
<?php
include_once("connection.php");
		if (isset($_POST['submit']))
		{
		//check fields
		$oldpassword = md5($_POST['oldpassword']);
		$newusername = $_POST['username'];
		$newpassword = $_POST['newpassword'];
		$repeatnewpassword = ($_POST['repeatnewpassword']);
		//check pass against db
		$queryget = mysql_query("SELECT password FROM users WHERE username='$user'") or die("Query didn't work");   
		$row = mysql_fetch_array($queryget);
 		$oldpassworddb = $row['password'];
		//check pass
		
		if (!($oldpassword==$oldpassworddb))
		{
		header("location:error_change_password1.php");
		//check twonew pass
	 	}
		else if ($newpassword==$repeatnewpassword)
		{
				$newpassword = md5($newpassword);
				$password_change = mysql_query("UPDATE users SET password='$newpassword', username='$newusername' WHERE password='$oldpassword'");
				//session_destroy();
				header("location:password_changed.php");
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
<table width="104%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td width="450" rowspan="2"><img src="mm_travel_photo.jpg" alt="Header image" width="382" height="127" border="0" /></td>
    <td height="63" colspan="2" id="logo" valign="bottom" align="center" nowrap="nowrap"><b>ONLINE LIBRARY CATALOGUE </b></td>
    <td width="386">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="2" id="tagline" valign="top" align="center">Jordan University </td>
	<td width="386">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="5" id="dateformat" height="25"><font color="blue" align="rigth"> <?php echo "Welcome, ".'<b>'.$user.''.'</b>';?></font>
  	  <div align="right">
	  Today is:
	  <strong>
  	    <font color="blue" align="rigth"><script language="JavaScript" type="text/javascript">
		
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
	<table align="left" border="0" cellspacing="0" cellpadding="0" width="180" id="navigation">
	<tr><td><strong>
        <h2>Managerial Tasks</h2>
        <strong></td></tr>
        <tr>
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
 	
	<table width="407" height="224" border="0" align="center">

	<form action="change_password.php" method="post">
	
      <br/>
	  <tr>
        <td height="43" colspan="2"><strong>Carefully and Correctlly Enter your details in the form below</strong> </td>
        </tr>
	  <tr>
        <td height="43">Enter Current Password</td>
        <td><input type="password" name="oldpassword" size="30" required/></td>
      </tr>
	  <tr>
        <td width="173" height="53">Enter New Username</td>
        <td width="224"><input type="text" name="username" size="30" required/></td>
      </tr>
      <tr>
        <td height="48">Enter New Password</td>
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
	  </form>
    </table> 	
	 
	<br />
  	&nbsp;<br />
  	&nbsp;<center>
    </center><br />
  	&nbsp;<br /> <br />
  	<br />
	<br/><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br /></td>
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
