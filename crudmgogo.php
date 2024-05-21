<?php
//session_start();
   ?>
<!DOCTYPE html>
<html >
<head>
<meta  charset="utf-8" />
<--link rel="stylesheet" type="text/css" href="new.css" /-->
<title></title>
</head>
<body >

<div id="heading">
      <h1 ><img src="images/header.png"></h1>
</div>

<div id="middle">
</script>
<?php
if (isset($_GET['empno']) && !isset($_GET['field'])) 
{
 include_once("connection.php");
 $empno = $_GET['empno'];
 $query = "DELETE FROM employee WHERE empno = $empno";
 $result = mysql_query($query,$link) or die (mysql_error());
 $msg = "Record deleted!";
}
$msg = ""; 
?>
<span style="color:	#484848 ;">
<center><h2>SEARCH EMPLOYEE PAYROLL RECORD</h2></center>
<center><i>
<script type="text/javascript">
 function proceed() {
  return confirm('Delete this record?');
 }
 </script>


<script type="text/javascript"> document.write('<h3>'+Date()+'</h3>') </script>
</center>
</i>

<?php
 include_once("connection.php");
    $query = $_GET['query']; 
    $min_length = 1;
	 if(strlen($query) >= $min_length)
	 { 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);  
		
		echo "<table border='0' align='center'>";
	        echo "<tr align='center' bgcolor='#002C40' > 
			<td>Author</td> 
			<td>Title</td>
			<td>ISBN</td>
			<td>Date of Publication</td>
			<td>Keywords</td>
			<td>Call Number</td>
			<td>Publisher</td>
			<td>Place of publication</td>
			</tr>";     
        $raw_results = mysql_query("SELECT * FROM info_package WHERE 
(author LIKE '%".$query."%') OR (title LIKE '%".$query."%')OR (isbn_no LIKE '%".$query."%')OR 
(date_pub LIKE '%".$query."%')OR (keywords LIKE '%".$query."%')OR (call_no LIKE '%".$query."%')OR 
(publisher LIKE '%".$query."%')OR (place_pub LIKE '%".$query."%')") or die(mysql_error());
        if(mysql_num_rows($raw_results) > 0)
		{
            while($results = mysql_fetch_array($raw_results))
			{ 
                echo "<tr align='center' bgcolor='blue'>
				<td height='25px'>".$results['author']."</td>
				<td>".$results['title']."</td>
				<td>".$results['isbn_no']."</td>
				<td>".$results['date_pub']."</td>
				<td>".$results['keywords']."</td>
				<td>".$results['call_no']."</td>
				<td>".$results['publisher']."</td>
				<td>".$results['place_pub']."</td>
				</tr>" ;
            }
          
        }
        else{ 
            echo "<tr align='center' bgcolor='#6C0000'><td colspan='2' height='25px'>No results</td><tr>";	
			 echo "</table>";  
        }   
    }
?><td width="30px;">
<div id="search">
<form action="crudmgogo.php" method="get" >
<table border="0" cellpadding="0" cellspacing="0">
<tr>
    <td><input type="text" name="query" id="text"  />&nbsp;</td>
	<td><input type="submit" name="submit" id="search" value="Search" /></td>
</form>
</div>
<table border bgcolor="339900"="2">
<tr>
  <th>Author</th>
  <th>Title</th>
  <th>ISBN</th>
  <th>Date of publication</th>
  <th>Keywords</th>
  <th>Call Number</th>
  <th>Publisher</th>
  <th>Allowances</th>
  <th>Place of publication</th>
  <th colspan="2">Action</th>
<tr>
<?php
if (isset($_POST["field"])) {
  $key = strtoupper($_POST["key"]);
  $field = $_POST["field"];
  if (!empty($_POST["key"]))
    if ($field == "empno")
      if (is_numeric($key))
        $query = "SELECT * FROM info_package WHERE empno = $key";
      else
        exit('Please enter a numeric value!');
     else
      $query = "SELECT * FROM info_package WHERE UPPER($field) like '$key%'";
  else
    $query = "SELECT * FROM info_package";
}
else
  $query = "SELECT * FROM info_package";

$result = mysql_query($query) or die (mysql_error());
while ($row = mysql_fetch_array($result)) 
{
  echo '<td>'.$row['author'].'</td>';
  echo '<td>'.$row['title'].'</td>';
  echo '<td>'.$row['isbn_no'].'</td>';
  echo '<td>'.$row['date_pub'].'</td>';
  echo '<td>'.$row['keywords'].'</td>';
  echo '<td>'.$row['call_no'].'</td>';
  echo '<td>'.$row['publisher'].'</td>';
  echo '<td>'.$row['place_pub'].'</td>';
  echo "<td><a href='info_packageform.php?isbn_no=".$row['isbn_no']."'>Edit</td>";
  echo "<td><a href='search.php?empno=";
  echo $row['isbn_no'];
  echo "' onclick=";
  echo "'return proceed()";
  echo "'>Delete</td> </tr>";
}
echo "</table>";
echo "<p><strong>".mysql_num_rows($result)." record(s).</strong></p>";
?>
</div>

<div id="footer">
       <img src="images/footer.gif"/>
</div>
</body>
</html>