<?php
$conn = mysqli_connect("localhost","root","","miniproject");
session_start();
$week=$_GET["week"];
$data=$_GET["data"];
echo $week.$data;
?>