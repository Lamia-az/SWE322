<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

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

<body>
  <!-- --------------NavBar--------------- -->
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
    <h2><b>Welcome!</b></h2>
  </div>

</body>

</html>