<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location:home.php');
    }
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
    <!-- --------------JS Files--------------- -->
    <script src="JS_Validation.html"></script>

    <title>Create Profile</title>
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
        <h2><b>Create a new profile</b></h2><br>
        <!-- --------------Bootstrap Form-------------- -->
        <form method="POST" action="create_profile_action.php">
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="f_name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="l_name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="c_phone" class="col-sm-2 col-form-label">Contact Phone</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="c_phone" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="c_email" class="col-sm-2 col-form-label">Contact Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="c_email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="city" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="country" required>
                </div>
            </div>
            <div class="col-sm-5">
                <input type="submit" name="create" value="Create" class="btn btn-primary mb-2">
            </div>
        </form>
    </div>


</body>

</html>