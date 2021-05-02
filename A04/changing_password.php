<?php
    session_start();
    include 'connection.php';
    $username=$_SESSION['username'];
    if (!isset($_SESSION['username'])) {
      header('location:home.php');
    }

    if (isset($_POST['submit'])) {

        $oldpass= MD5($_POST['current_password']);
        $newpass = $_POST['new_password'];
        $cnewpass = $_POST['confirm_password'];
        $finalpass= MD5($newpass);

        if($newpass == $cnewpass){

            $numrows = $pdo->query("select count(*) from user_accounts where user_name='$username' && password='$oldpass'")->fetchColumn(); 

            if($numrows==1){


                if(strlen($newpass) < '8' || !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $newpass) || !preg_match('/[A-Z]/', $newpass) || !preg_match('/[a-z]/', $newpass) || !preg_match('/\d/',$newpass)){
    
            
                    if(strlen($newpass) < '8') {
                      $passwordErr = "Your password must contain at least 8 characters";    
                    }
                    elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $newpass)) {
                      $passwordErr = "Your password must contain special characters";    
                    }
                    elseif(!preg_match('/[A-Z]/', $newpass)) {
                      $passwordErr = "Your password must contain one uppercase Letter";    
                    }
                    elseif(!preg_match('/[a-z]/', $newpass)) {
                      $passwordErr = "Your password must contain one lowercase Letter";    
                    }
                    elseif(!preg_match('/\d/',$newpass)){
                      $passwordErr = "Your password must contain one number"; 
                    } 
                  }
                  else{
                        $data = [
                            'finalpass' => $finalpass,
                            'username' => $username
                        ];
                        $sql = "UPDATE user_accounts SET password=:finalpass WHERE user_name=:username";
                        $stmt= $pdo->prepare($sql);
                        $stmt->execute($data);
                        header('location:login.php');
                  }
            }
            else{
                $pass_error="Sorry old password don't match. Try again";
            }
            
        }
        else{
            $match_error="New Password don't match. Try again";
        }
        

    }



?>


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        

        
        <title>Login</title>
    </head>
    
    <style>
    .error {color: #FF0000;}
    .warnbox{color:#ffc107;}
    </style>
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

  
        <h2>Change password</h2>
        <form action="" method="post">
            
                <label for="current_password">Your current password</label>
                <br>
                <input type="password" name="current_password" id="current_password" />
                <br><br>
                <label for="new_password">Your new password</label>
                <br>
                <input type="password" name="new_password" id="new_password" />
                <br>
                <p id="passwordWarnBox" class="warnbox"></p>
                <label for="new_password">Type again your new password</label>
                <br>
                <input type="password" name="confirm_password" id="confirmpassID"/><br><br>
                <p id="passwordWarnBox2" class="warnbox"></p>
                <button  name="submit" type="submit">Change password</button>
               
        </form>
        <?php if (isset($passwordErr)): ?>
      	    <span class="error"><?php echo $passwordErr; ?></span>
        <?php endif ?> 

        <?php if (isset($pass_error)): ?>
      	    <span class="error"><?php echo $pass_error; ?></span>
        <?php endif ?> 
        <?php if (isset($match_error)): ?>
                <span class="error"><?php echo $match_error; ?></span>
        <?php endif ?> 
        
    </div>
         
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="JavaScriptValidation.js"></script>
</html>