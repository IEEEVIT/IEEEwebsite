<?php
    $userName='root';
    $hostName='localhost';
    $password = '';
    $dbName='ieeenewwebsite';
    $link= mysqli_connect($hostName, $userName, $password, $dbName);
    mysqli_select_db($link, $dbName) or die("ERROR.");
?>