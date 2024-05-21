<?php
include_once("session.php");
include_once("connection.php");
?>
<?php
//setcookie("user", "Deus Francis", time()+3600);
?>
<?php
// Print a cookie
//echo $_COOKIE["user"];

// A way to view all cookies
//print_r($_COOKIE);
?>

<?php
if(!$user)
{
	header("Location: index.php");
}
?>
<?php
// define a constant for the maximum upload size
define ('MAX_FILE_SIZE', 1024 * 50);

if (array_key_exists('upload', $_POST)) {
  // define constant for upload folder
  define('UPLOAD_DIR', '/path/to/images/');
  // replace any spaces in original filename with underscores
  $file = str_replace(' ', '_', $_FILES['image']['name']);
  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg',
'image/png');
  
  // upload if file is OK
  if (in_array($_FILES['image']['type'], $permitted)
      && $_FILES['image']['size'] > 0 
      && $_FILES['image']['size'] <= MAX_FILE_SIZE) {
    switch($_FILES['image']['error']) {
      case 0:
        // check if a file of the same name has been uploaded
        if (!file_exists(UPLOAD_DIR . $file)) {
          // move the file to the upload folder and rename it
          $success =
move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR .
$file);
        } else {
          $result = 'A file of the same name already exists.';
        }
        if ($success) {
          $result = "$file uploaded successfully.";
        } else {
          $result = "Error uploading $file. Please try again.";
        }
        break;
      case 3:
      case 6:
      case 7:
      case 8:
        $result = "Error uploading $file. Please try again.";
        break;
      case 4:
        $result = "You didn't select a file to be uploaded.";
    }
  } else {
    $result = "$file is either too big or not an image.";
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
<?php
if (isset($_COOKIE["user"]))
  echo "Welcome " . $_COOKIE["user"] . "!<br>";
else
  echo "Welcome guest!<br>";
?>
</script>
</head>
<body bgcolor="#C0DFFD">
<?php
// if the form has been submitted, display result
if (isset($result)) {
  echo "<p><strong>$result</strong></p>";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2"><img src="mm_travel_photo.jpg" alt="Header image" width="382" height="127" border="0" /></td>
    <td height="63" colspan="2" id="logo" valign="bottom" align="center" nowrap="nowrap"><b>ONLINE LIBRARY CATALOGUE </b></td>
    <td width="328">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="2" id="tagline" valign="top" align="center">Jordan University </td>
	<td width="328">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="6" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="6" id="dateformat" height="25">&nbsp;&nbsp;
  	  <div align="right">
	  <font color="blue" align="rigth"> <?php echo "Welcome ".'<b>'.$user.'.'.'</b>';?></font> Today is: 
  	    <script language="JavaScript" type="text/javascript">
      document.write(TODAY);</script>	
      </div></td>
  </tr>
 <tr>
    <td colspan="6" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td colspan="6" valign="top" bgcolor="#E6F3FF"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="1278" height="390" border="0">
        <tr>
          <td width="216" rowspan="5"><table border="0" cellspacing="0" cellpadding="0" width="188" id="navigation">
            <tr>
              <td width="188"><a href="info_packageform.php" class="navText">Register new record </a></td>
            </tr>
            <tr>
              <td width="188"><a href="view.php" class="navText">View All Records </a></td>
            </tr>
            <tr>
              <td width="188"><a href="simplesearch_form.php" class="navText">Visit OPAC </a></td>
            </tr>
            <tr>
              <td width="188"><a href="change_password.php" class="navText">Change Username and Password </a></td>
            </tr>
            <tr>
              <td width="188"><a href="javascript:;" class="navText">Contact the Administrator</a></td>
            </tr>
            <tr>
              <td width="188"><a href="logout.php" class="navText">Logout</a></td>
            </tr>
          </table></td>
          <td width="387">&nbsp;</td>
          <td width="311">&nbsp;</td>
          <td width="179">&nbsp;</td>
          <td width="107">&nbsp;</td>
          <td width="52">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><html>


</body>
</html> &nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="53"><td rowspan="3">
		  <form action="home_user.php" method="post" enctype="multipart/form-data"
name="uploadImage" id="uploadImage">
<p>
  <input type="hidden" name="MAX_FILE_SIZE" 
    value="<?php echo MAX_FILE_SIZE; ?>" />
  <label for="image">Upload image:</label>
  <input type="file" name="image" id="image" />
</p>
<p>
  <input type="submit" name="upload" id="upload" 
value="Upload" />
</p>
</form>
&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <br />
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
    <td colspan="6">&nbsp;</td>
  </tr>
</table>
</body>
</html>
