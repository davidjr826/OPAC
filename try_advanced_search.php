<?php 

   /* call this script "advs.php" */

   if(!$c) { 

?>

<form action="advs.php?c=1" method=POST>

<b>Find Results with: </b><br>

Any of these words: <input type="text" length=40 name="any"> <br>

All of these words: <input type="text" length=40 name="all"> <br>

None of these words: <input type="text" length=40 name="none"> <br>

<input type="submit" value="Search">

</form>

<?php

   } else if($c) {

   MySQL_connect("hostname", "username", "password");

       MySQL_select_db("database");

   if((!$all) || ($all == "")) { $all = ""; } else { $all = "+(".$all.")"; }

   if((!$any) || ($any == "")) { $any = ""; } 

   if((!$none) || ($none == "")) { $none = ""; } else { $none = "-(".$none.")"; }

   $query = "

       SELECT *,

          MATCH(title, story) AGAINST ('$all $none $any' IN BOOLEAN MODE) AS score 

          FROM compsite 

       WHERE MATCH(title, story) AGAINST ('$all $none $any' IN BOOLEAN MODE)";

      $artm1 = MySQL_query($query);

      if(!$artm1) { 

         echo MySQL_error()."<br>$query<br>"; 

      }

      echo "<b>Article Matches</b><br>";

      if(MySQL_num_rows($artm1) > 0) {

         echo "<table>";

          echo "<tr><td>Score </td><td>Title </td><td>Body</td></tr>";

             while($artm2 = MySQL_fetch_array($artm1)) {

            $val = round($artm2['score'], 3);

            $val = $val*100;

            echo "<tr><td>$val</td>";

            echo "<td>{$artm2['title']}</td>";

            echo "<td>{$artm2['body']}</td></tr>";

         }

      echo "</table>";

   }

   else { 

      echo "No Results were found in this category.<br>"; 

   }

   echo "<br>"; 

   }
$query = "

    SELECT *

        MATCH(title, story) AGAINST ('$all $none $any' IN BOOLEAN MODE) AS score

    FROM compsite

    WHERE

        MATCH(title, story) AGAINST ('$all $none $any' IN BOOLEAN MODE)";
		 if(MySQL_num_rows($artm1) > 0) {

      echo "<table>";

    echo "<tr><td>Score </td><td>Title </td><td>Body</td></tr>";

          while($artm2 = MySQL_fetch_array($artm1)) {

         $val = round($artm2['score'], 3);

         $val = $val*100;

         echo "<tr><td>$val</td>";

         echo "<td>{$artm2['title']}</td>";

         echo "<td>{$artm2['body']}</td></tr>";

      }

   echo "</table>";
?>
