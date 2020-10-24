<?php

$servername = "localhost";
$dBUsername = "admin";
$dBPassword = "Newpassword1";
$dBName = "loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}
