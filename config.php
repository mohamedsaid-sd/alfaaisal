<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alfaaisal";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("<div class='alert alert-danger text-center'>فشل الاتصال بقاعدة البيانات: " . $conn->connect_error . "</div>");
    }
?>