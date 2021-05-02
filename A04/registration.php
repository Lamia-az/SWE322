<?php
    session_start();
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nameErr = $passwordErr = $emailErr =  "";
    $name = $password = $email =  "";

    $user_namereg = $_POST['name'];
    $passwordoriginal = $_POST['password'];
    $passwordreg = MD5($_POST['password']);
    $emailreg = $_POST['email'];

    $name = test_input($_POST["name"]);
    $password = test_input($_POST["password"]);
    $email = test_input($_POST["email"]);

    
   
    $quser = "select * from user_accounts where user_name='$user_namereg'";
    $_resultuser = mysqli_query($conn, $quser);
    $numuser = mysqli_num_rows($_resultuser);

    $quser2 = "select * from user_accounts where email='$emailreg'";
    $_resultuser2 = mysqli_query($conn, $quser2);
    $numemail = mysqli_num_rows($_resultuser2);

    if($numuser ==1){
      $user_error="Username already exist. Try with different username";
    }
    elseif($numemail==1){
      $email_error="Email already exist. Try with different email";
    }
    else{

      if(strlen($user_namereg) < '3' || strlen($user_namereg) > '15' || strlen($passwordoriginal) < '8' || !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/',$password)){
    
        
        if(strlen($user_namereg) < '3'){
          $nameErr="User name shouldn’t be less than 3 letters or more than 15 letters"; 
        }
        elseif(strlen($user_namereg) > '15'){
        $nameErr="User name shouldn’t be less than 3 letters or more than 15 letters";   
        }

        if(strlen($passwordoriginal) < '8') {
          $passwordErr = "Your password must contain at least 8 characters";    
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
          $passwordErr = "Your password must contain special characters";    
        }
        elseif(!preg_match('/[A-Z]/', $password)) {
          $passwordErr = "Your password must contain one uppercase Letter";    
        }
        elseif(!preg_match('/[a-z]/', $password)) {
          $passwordErr = "Your password must contain one lowercase Letter";    
        }
        elseif(!preg_match('/\d/',$password)){
          $passwordErr = "Your password must contain one number"; 
        } 
      }
      else{
        header("location:registration_action.php?user=$user_namereg&pass=$passwordreg&email=$emailreg"); 
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


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- --------------Bootstrap-------------- -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <title>Home</title>
</head>
  
<style>
.error {color: #FF0000;}
.warnbox{color:#ffc107;}
</style>
</head>
<body> 
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" class="active" href="home.php">Home</a>
      </div>
      <ul class="nav navbar-nav">
       
        <li><a href="registration.php">Registration</a></li>
       
        <li><a href="login.php">Login</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['yesprofile'])) { ?>
            <li><a href="user_profile.php">Profile</a></li>
        <?php } elseif(isset($_SESSION['noprofile'])) { ?>
          <li><a href="create_profile.php">Profile</a></li>
        <?php } else{ ?>
        <?php }?>

        <?php if (isset($_SESSION['username'])) { ?>
          <li><a href="changing_password.php">Change Password</a></li>
        <?php } ?>
        <?php if (isset($_SESSION['username'])) { ?>
          <li><a href="logout.php">Logout</a></li>
        <?php } ?>


        


      </ul>
    </div>
  </nav> 

  <div class="container">

 


    <h2>Registeration Form</h2>
    
    <p><span class="error">* required field</span></p>
    
    <form method="post"> 
        
    Username(*): <input type="text" name="name" id="usernameID" value="<?php if (isset($_POST['submit'])):?><?php echo $user_namereg; ?><?php endif ?>" required> 
    <p id="userIdWarn" class="warnbox"></p>
    <?php if (isset($nameErr)): ?>
      	    <span class="error"><?php echo $nameErr; ?></span>
    <?php endif ?>  
    <br>
        
    Password(*): <input type="password" name="password" id="passwordID" value="<?php if (isset($_POST['submit'])):?><?php echo $passwordoriginal;?><?php endif ?>" required>  
    <p id="passwordWarn" class="warnbox"></p>
      <?php if (isset($passwordErr )): ?>
      	    <span class="error"><?php echo $passwordErr; ?></span>
    <?php endif ?> 
    <br>
        
    E-mail(*): <input type="email" name="email" id="emailID" value="<?php if (isset($_POST['submit'])):?><?php echo $emailreg;?><?php endif ?>" required>   
      <p id="emailWarn" class="warnbox"></p>
      <?php if (isset($emailErr)): ?>
      	    <span class="error"><?php echo $emailErr; ?></span>
    <?php endif ?> 
    <br>
        
    <input type="submit" name="submit" value="Submit">  
    </form>
    <br><br>
    <?php if (isset($email_error)): ?>
      	    <span class="error"><?php echo $email_error; ?></span>
    <?php endif ?> 
    <?php if (isset($user_error)): ?>
      	    <span class="error"><?php echo $user_error; ?></span>
    <?php endif ?> 
    <br><br>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JavaScriptValidation.js"></script>
</html>