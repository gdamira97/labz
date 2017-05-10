<?php
   $number=$_POST['number'];
   $fact=1;
   for ($x=1; $x=$number; $x++){
   	   $fact=$x*$fact;
   }
   echo $fact;