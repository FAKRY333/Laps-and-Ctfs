<?php 
// first check 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>andmin dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body style="background-color:#0fcfcf">
        <header style="background-color:#1b7fdb">
        <h2 class="logo">control</h2>
        <ul> 
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Servise</a></li>
            <li><a href="tel:01023871960">contact</a></li>
        </ul>
    </header>
      
    <div class="content"  style="background-color:#96cbfc">
        <h1>Users</h1>


    <?php
    
    
// get the conection file
include('conct.php');
        $stmt = $conn->prepare("SELECT * FROM users WHERE 1 = 1");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// show all the users 
    foreach($users as $user) {
        // upgrde or done grade mehtod 
echo "<br>";
echo '<div style="background-color:#005aad" ><h2>' . $user['username'] . '</h2>';
echo '<h2>' . $user['role'] . '</h2>';
echo "<form action='deletuser.php' method='post'>
     <input type='hidden' name='username' value=" . $user['username'] . ">
    <input type='hidden' name='id' value=" . $user['id'] . ">
    <button type='submit'>DElETE</button>
</form>
";
// delete method 
echo "
<form action='upuser.php' method='post'>
<input type='hidden' name='id' value=" . $user['id'] . ">
<select name='role' >
<option value='user'>USER</option>
<option value='admin'>ADMIN</option>
</select>
<button type='submit'>up/done</button>
</form>";
echo "</div>";
}
?>
    </div>


<?php 
         $stmt = $conn->prepare("select * from users WHERE username = 'karker12' and password = 'user' ");
    $stmt->execute();
    $userk = $stmt->fetch(PDO::FETCH_ASSOC) ;
    $cont = $stmt->rowCount();

    if ($userk['role'] == 'admin') {

        ?>
<h2 style='text-align:center'>
    cungratolation ! <br>  <sapn style="color:red;display: inline;">karkr{you_are_win}</h1>
</h2>

<?php 

}
?>


    <footer>Made By fakry mohamed 10/3/2025</footer>
    
   
</body>
</html>












