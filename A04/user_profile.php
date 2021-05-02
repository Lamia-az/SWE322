<?php
    session_start();
    include 'connection.php';
    $username=$_SESSION['username'];
    if (!isset($_SESSION['username'])) {
        header('location:home.php');
    }


    $sql = "SELECT * FROM profile WHERE user_id='$username'";

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
        $fname=$row['first_name'];
        $lname=$row['last_name'];
        $uphone=$row['contact_phone'];
        $uemail=$row['contact_email'];
        $ucity=$row['city'];
        $ucountry=$row['country'];
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
        <h3>User profile Information:</h3>
        <p><strong>First Name:</strong> <?php echo $fname?></p>
        <p><strong>Last Name:</strong> <?php echo $lname?></p>
        <p><strong>Phone:</strong> <?php echo $uphone?></p>
        <p><strong>Email:</strong> <?php echo $uemail?></p>
        <p><strong>City:</strong> <?php echo $ucity?></p>
        <p><strong>Country:</strong> <?php echo $ucountry?></p>
    </div>

    
    






</body>
</html>
