<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)) {
        echo "Success";
        } 
        else {
        echo "Error";
    }
    ?>