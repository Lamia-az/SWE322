<?php
    session_start();
    include 'connection.php';
    $username=$_SESSION['username'];
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname= $_POST['f_name'];
    $lname= $_POST['l_name'];
    $phone= $_POST['c_phone'];
    $email = $_POST['c_email'];
    $city = $_POST['city'];
    $country = $_POST['country'];


    $statement = $pdo->prepare("INSERT INTO profile(user_id,first_name,last_name,contact_phone,contact_email,city,country) VALUES (?,?, ?, ?,?,?,?)");
    $statement->execute(array($username,$fname,$lname,$phone,$email,$city,$country));
    $_SESSION['yesprofile']="Yes";   
    header("Location: user_profile.php");

    }
?>