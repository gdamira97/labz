<?php
$login=$_POST['login'];
$password=$_POST['password'];
$password = $password;
include ("database.php");
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); 
$myrow = mysql_fetch_array($result);
if (empty($myrow['id']))
    {
         exit ("Извините, введённый вами логин адрес или пароль неверный. Введите правильные данные. <a href='login.php'>Войти</a>");
    }
else 
   {
        if ($myrow['password']==$password) 
          {
            echo "OK";
          }
       else
          {
        exit ("Извините, введённый вами E-mail адрес или пароль неверный. Введите правильные данные. <a href='login.php'>Войти</a>");

   }
 }
?>