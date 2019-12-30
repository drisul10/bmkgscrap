<?php
$conn = mysqli_connect("localhost", "root", "qomarudin", "db_bmkgscrp");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
