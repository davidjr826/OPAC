<?php
session_start();
//$user = $_SESSION["username"];
?>
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
	<h1>Search Results</h1>
	<?php
 include_once("connection.php");
    $query = $_GET['query']; 
    $min_length = 1;
	 if(strlen($query) >= $min_length)
	 { 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);  
		     
        $raw_results = mysql_query("SELECT * FROM info_package WHERE 
(author LIKE '%".$query."%') OR (title LIKE '%".$query."%')OR (isbn_no LIKE '%".$query."%')OR 
(date_pub LIKE '%".$query."%')OR (keywords LIKE '%".$query."%')OR (call_no LIKE '%".$query."%')OR 
(publisher LIKE '%".$query."%')OR (place_pub LIKE '%".$query."%')") or die(mysql_error()); 
       
	   $rows_count=mysql_num_rows($raw_results);
	               echo '" ';
				   echo '<strong>';
				   echo $rows_count;
				   echo '</strong>';
            echo ' Records found " ';  
			echo "<br/>";
			
	   if($rows_count>=1)
	   {
	for($i=0;$i<$rows_count;$i++)
	{
$row=mysql_fetch_array($raw_results);
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
        }
        else{ 
            echo "No matches found for the word " ;
			echo '<i><strong>';
				echo '"';
			echo $query; 
			echo '"';
	echo '</i></strong>';			
        }  } 
    
?> 
</center><br />
  	&nbsp;<center>
<h1>&nbsp;</h1>
</center>
  	<center>
	<p><a href="student_opac.php">Go Back</a></p>
    </center>
  	<p><br />
  	  &nbsp;<br /> 	
  	  <br />
  	  &nbsp;<br />
  	  &nbsp;</p>
  	<p><center>
      </center><br />
	  </p>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  	<p>&nbsp;</p>
  	<p><br />	
  	  <img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /><br />
  	  &nbsp;<br />
	  </p></td>
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
