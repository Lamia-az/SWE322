<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

    $nameErr = $passwordErr = $emailErr =  "";
    $name = $password = $email =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    if (empty($_POST["name"])) {
    $nameErr = "Enter your name";
    } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
    
    if (empty($_POST["password"])) {
    $passwordErr = "Enter your password";
    } else {
    $password = test_input($_POST["password"]);
    if (strlen($_POST["password"]) <= '8') {
    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
    }
    
    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
 
}

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <h2>Registeration Form</h2>
    
    <p><span class="error">* required field</span></p>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        
    Name: <input type="text" name="name" value="<?php echo $name;?>"> 
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
        
    Password: <input type="text" name="password" value="<?php echo $password;?>">  
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
        
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">   
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
        
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $password;
    echo "<br>";
    echo $email;
    echo "<br>";

?>

</body>
</html>