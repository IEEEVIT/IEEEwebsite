<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "ieeenewwebsite";

    if (!$conn = new mysqli($server, $username, $password, $db)) {
        echo "Some Error Occurred. Please try again.";
        exit();
    }