<?php 
session_start();
include('C:\xampp\htdocs\App\conct.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {   
$id = $_POST['id'];
$role = $_POST['role'];
  $stmt = $conn->prepare("UPDATE `users` SET `role` = '$role' WHERE `users`.`id` = '$id';");
    $stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
header("location: index.php");
}



?>