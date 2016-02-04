<?php
    $userName='root';
    $hostName='localhost';
    $password = '';
    $dbName='techloop';
    $link= mysqli_connect($hostName, $userName, $password);
    mysqli_select_db($link, $dbName) or die("ERROR.");