<?php
$dns = "mysql:host=localhost;dbname=shop";
$uesr = "root";
$pass = "";
$option = array(
    // PDO::MYSQL_ATTR_INTI_COMMEND => "SET NAMES UTF8"

);
try {

    $conn = new PDO($dns , $uesr , $pass ,  $option);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo $e->getMassage() ;
};
