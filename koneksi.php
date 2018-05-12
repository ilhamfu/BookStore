<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "bookstore";
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($conn,$db) or die ("database tidak tersedia");
?> 