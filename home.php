<?php
session_start();
$user = $_SESSION["username"];
?>
<?php
//create a database connection
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
	$author=$_POST['author'];
	$title=$_POST['title'];
	$isbn_no=$_POST['isbn_no'];
	$date_pub=$_POST['date_pub'];
	$keywords=$_POST['keywords'];
	$call_no=$_POST['call_no'];
	$publisher=$_POST['publisher'];
	$place_pub=$_POST['place_pub'];
	$insert = mysql_query("INSERT  INTO info_package(author,title,isbn_no,date_pub,keywords,call_no,publisher,place_pub)
	values('".$author."','".$title."','".$isbn_no."','".$date_pub."','".$keywords."','".$call_no."','".$publisher."','".$place_pub."')");
	//mysql_query($insert);
	mysql_close($db_connection);
	header("location:registered_success.php");
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
	  <font color="blue" align="rigth"> <?php echo "Hallo ".'<b>'.$user.'.'.'</b>';?></font> Today is: 

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
 	
	<table width="350" height="400" border="0" align="center">
		
	<form action="info_packageform.php" method="post">
      <br/>
	  <tr>
        <td>Author</td>
        <td><input type="text" name="author" size="30" required/></td>
      </tr>
      <tr>
        <td>Title</td>
        <td><input type="text" name="title" size="30" required/></td>
      </tr>
      <tr>
        <td>ISBN Number</td>
        <td><input type="text" name="isbn_no" size="30" required/></td>
      </tr>
      <tr>
        <td>Year of Publication</td>
        <td><input type="year" name="date_pub" size="30" required pattern="([0-9]{4})" 
		onchange="this.setCustomValidity(this.Validity.patternMismatch ? 'A year must have 4 digits' :'');"/></td>
      </tr>
      <tr>
        <td>Keywords</td>
        <td><input type="text" name="keywords" size="30" required/></td>
      </tr>
      <tr>
        <td>Call Number</td>
        <td><input type="text" name="call_no" size="30" required/></td>
      </tr>
      <tr>
        <td>Publisher</td>
        <td><input type="text" name="publisher" size="30" required/></td>
      </tr>
      <tr>
        <td>Place of Publication</td>
        <td><input type="text" name="place_pub" size="30" required/></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" size="size""10" value="Add Record" />
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
</table>
</body>
</html>
