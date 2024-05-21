<?php

$query="delete from info_package  where id = ".@$_GET['id'].";";
$duery=mysql_query($query);
echo "are you sure you want to delete";
echo'<form action="delete1.php" method="GET">
<input type="hidden" name="id" value="<?php  echo $_GET["id"] ?>" >
<input type ="submit" name="Ok" />
</form>';
?>