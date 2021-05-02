<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

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
        <h2><b>Login</b></h2><br>
        
        <form method="POST" action="login_action.php">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="submit" name="login" value="Login" class="btn btn-primary mb-2">
            </div>
        </form>
        <?php if (isset($login_error)): ?>
      	    <span class="error"><?php echo $login_error; ?></span>
        <?php endif ?> 
    </div>

    <?php
        

        if (!empty($_SESSION['error'])){
    ?>
    <div class="alert">
    <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        }
    ?>
   </div>

</body>

</html>