<?php
mysql_connect("localhost","root","");
mysql_select_db("quiz");
$login=$_REQUEST['login'];
$password=$_REQUEST['password'];
$query = "SELECT * FROM users WHERE login='$login'";
$result = mysql_query($query); 
$myrow = mysql_fetch_array($result);
if ($myrow['password']==$password) 
          {
              $login=$myrow['login'];
              echo "Success"; 
          }
          else
          {
           echo "Error";  
          }
?>