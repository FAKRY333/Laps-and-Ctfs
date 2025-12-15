<?php
// contact to database 
include("conct.php");


//  print_r($user);
/// check 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'] ;
    $pass = $_POST['pass'];
    // do quary
    $stmt = $conn->prepare("select * from users WHERE username = '$name' and password = '$pass' ");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC) ;
    $cont = $stmt->rowCount();

    print_r($user);
    if ( $user['username'] and  $user['password']) {
        session_start();
        echo'cridithals are rigt ';
        header("location: /access_control/profill?id=" . $user['id']  );
    } else {
        echo'wrong ';
    }
}