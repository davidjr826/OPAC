
<?php
if(isset($_POST['submit']))
{
$name=$_FILES['file']['name'];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$max_size=800108703;
$extension=strtolower(substr($name, strpos($name, '.')+1));
$temp_val=$_FILES['file']['tmp_name'];
if(isset($name))
{
	if(!empty($name))
	{
	if($size<$max_size)
	{
		$location="movies/";
		
		if(move_uploaded_file($temp_val, $location.$name))
		{
			echo "Successifully uploaded";
		}
		else
		{
			echo "error";
		}
	}
	}
}
}

?> 

<html>
<body>
<form action="upload_files.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>