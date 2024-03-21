
<?php

    $database= new mysqli("localhost","root","","pharmacy");
    if ($database->connect_error){
         die("Connection failed:  ".$database->connect_error);
    }
?>