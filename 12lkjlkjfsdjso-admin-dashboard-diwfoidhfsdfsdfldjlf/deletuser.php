<?php 
session_start();
include('C:\xampp\htdocs\App\conct.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {   
$id = $_POST['id'];
$username = $_POST['username'];
deletUser($username);
}

function deletUser($user) {
    chdir('..');
    chdir('profill');
if (!file_exists($user)) {
    return false ;
}
    chdir('..');
    chdir("profill");
    chdir($user);   
    $user_Files = glob("*.*");
    for ($i = 0 ; $i < count($user_Files) ; $i++) {
        unlink($user_Files[$i]);
    }
  
chdir("edite");
    $user_Files = glob("*.*");
    for ($i = 0 ; $i < count($user_Files) ; $i++) {
        unlink($user_Files[$i]);
    }
chdir("photos");
    $user_Files = glob("*.*");
    for ($i = 0 ; $i < count($user_Files) ; $i++) {
        unlink($user_Files[$i]);
    }
chdir("..");
rmdir("photos");
chdir("..");
rmdir("edite");
chdir("..");
return rmdir($user);
};





if ($_SERVER['REQUEST_METHOD'] == "POST") {   
$id = $_POST['id'];
  $stmt = $conn->prepare("DELETE  FROM users WHERE id = $id ;");
    $stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
header("location: index.php");
}

