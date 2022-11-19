<?php 
    $con = new mysqli("localhost", "root", "", "hisakes");

    if ($con->connect_error){
        die("Connection Failed : ".$con->connect_error);   
    }
?>