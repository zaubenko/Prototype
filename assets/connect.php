<?php
    $connect=mysqli_connect("localhost", "root", "", "bingo");
    if(!$connect){
        die('Error connect to database');
    }

?>