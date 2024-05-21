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
  		<td colspan="5" id="dateformat" height="25" align="right">&nbsp;&nbsp;
	Today is:
	<b>
	<font color="#0000FF"><script language="JavaScript" type="text/javascript">
	
      document.write(TODAY);	</script>	</font></b>
	  </td>
  </tr>
 <tr>
    <td colspan="5" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
   <td colspan="5" valign="top" bgcolor="#E6F3FF">
	<br/>
	<br/>
	<center>
	<title>Advanced Search Results</title>
<meta charset="UTF-8">
</head>
<body>
<h1>Search Results</h1>
<p>
  <?php
include_once("connection.php");
$searchtype=$_POST['searchtype'];
$searchterm=$_POST['searchterm'];
$searchterm=trim($searchterm);
if(!$searchtype||!$searchterm)
{
echo "Please enter search details";
exit;
}
if(!get_magic_quotes_gpc())
{
$searchtype=addslashes($searchtype);
$searchterm=addslashes($searchterm);
}
$query="SELECT * FROM info_package where ".$searchtype." like '%".$searchterm."%' ";
$results=mysql_query($query);
$num_results=mysql_num_rows($results);
echo '<b>';
echo $num_results;
echo '</b>';
echo "  Records found: ";
for($i=0;$i<$num_results;$i++)
{
$row=mysql_fetch_array($results);
echo'<p><strong>'. ($i+1).'. Author: ';
echo htmlspecialchars(stripslashes($row['author']));
echo '</strong><br/>Title: ';
echo stripslashes($row['title']);
echo '</strong><br/>Place of Publication: ';
echo stripslashes($row['place_pub']);
echo '</strong><br/>Publisher: ';
echo stripslashes($row['publisher']);
echo '</strong><br/>Call Number: ';
echo stripslashes($row['call_no']);
}
?>
</p>
<p>&nbsp;</p>
<p><a href="student_advanced_opac.php">Go Back</a>        </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
   </body>
</html>
</center><br />
  	&nbsp;<center>
<h1>&nbsp;</h1>
</center>
  	<center>
    </center><br />
  	&nbsp;<br /> 	<br />
	&nbsp;<br />
	&nbsp;<br />
	<br />	<img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
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
