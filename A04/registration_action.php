<?php
    include 'connection.php';
    $user_namereg=$_GET['user'];
    $emailreg=$_GET['email'];
    $passwordreg=$_GET['pass'];

    
    $statement = $pdo->prepare("INSERT INTO user_accounts(user_name, email, password) VALUES (?, ?, ?)");
    $statement->execute(array($user_namereg,$emailreg, $passwordreg));   
    header("Location: Login.php");

?>