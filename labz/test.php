<?php
$login=$_GET["login"];
$damiraloh = $_GET["password"];
$damiraloh=md5($damiraloh);
$db = mysql_connect ("localhost","Damira","325462"); 
	mysql_select_db ("Ernar",$db); 

$query = "INSERT INTO `Damira`(`ID`, `Login`, `Password`) VALUES (NULL,'$login','$damiraloh')";
    $result2 = mysql_query ($query);
    //echo $query;
    if ($result2=='TRUE')
      {
                 echo "Ernar the best!!!";
     }
       else
     {
        echo "Error";
     }
?>