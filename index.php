<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>OPAC-Login Page</title>
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
  	<td colspan="5" id="dateformat" height="25" align="right">&nbsp;&nbsp;Today is: <font color="blue"><b><script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script></b></font>	</td>
  </tr>
 <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td colspan="5" valign="top" bgcolor="#E6F3FF">
	
 	 <br/>
 	<center>
  	    <p>
  	
  	<h2><strong> Login </strong></h2>
<?php
//database connection 
include_once("connection.php");
//check form fields
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	//$enc_password=$password;
	//hash("sha256", $password);
	//$insert=mysql_query("INSERT INTO users(username,password)
	//values('".$username."','".$password."')");
	//match fields from db
	$mysqli_select="SELECT * FROM users WHERE(username='".$username."' AND  password='".$password."')";
	$execute_query=mysqli_query($connect, $mysql_select);
	$result = mysqli_fetch_array($execute_query );
	$userlevel = $result["user_level"];
	//check if there is only 1 macth
	if (mysqli_num_rows($execute_query)>0)
	{	
		if($userlevel == 0){
		$_SESSION["username"] = $username;
		//echo"Login Successifully";
		header("Location:userloggedin.php");
		}
		else{
			$_SESSION["username"] = $username;
		//echo"Login Successifully";
			header("Location:adminloggedin.php");
			}
	}
	else
	{
		//header("Location:index.php");
	echo '<font color="red">'.'<b>'."Incorrect username or password,".'<br/>'."Please re-enter correct username and password:".'</b>'.'</font>'.'<br/>';
	
	}
}
?>
      </p>
      <form action="index.php" name="getlogin" method="post">
<table width="350" heigth="400">
<tr>
<td>Username:</td>
<td><input type="text" name="username" size="30" required title="Enter your username as provided by Administrator" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" size="30" required title="Enter your password as provided by Administrator" ></td>
</tr>
<tr>
<td height="26"></td>
<td>
<input type="submit" name="submit" value="Login" size="10">
<input type="reset" name="reset" value="Clear" size="10">
</td>
</tr>
</table>
</form>
  	</center>
  	<p><br />
  	  &nbsp;<br /> 	
  	  <br />
  	  &nbsp;<br />
  	  <br />
  	  </p>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  	<p><br />	
  	  <img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
  	  <br />
	  </p>
  	<p>&nbsp;</p></td>
 </tr>
  <tr>
    <td colspan="5"><center>
      <strong>Copyrights (c) Deus Francis & SUA 2019</strong>.
    </center>
    <p><center>
      <strong>All Rights Reserved.</strong>
    </center></p></td>
  </tr>
</table>
</body>
</html>
