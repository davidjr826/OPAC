<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Home Page</title>
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
  	<td colspan="5" id="dateformat" height="25">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
  </tr>
 <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td colspan="5" valign="top" bgcolor="#E6F3FF">
	<table border="0" cellspacing="0" cellpadding="0" width="188" id="navigation">
       <tr>
          <td width="188"><a href="adminloggedin.php" class="navText">Home </a></td>
        </tr
        <tr>
          <td width="188"><a href="change_photo.php" class="navText">Change Photo </a></td>
        </tr>
		<tr>
          <td width="188"><a href="change_password.php" class="navText">Change Username and Password </a></td>
        </tr>
		<tr>
          <td width="188"><a href="logout.php" class="navText">Logout </a></td>
        </tr>
      </table>
 	�<br />
  	&nbsp;<br />
  	&nbsp;<center>


</center><br />
  	&nbsp;<br /> 	<br />
	&nbsp;<br />
	&nbsp;<br />
	<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
    &nbsp;<br /></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>
</body>
</html>