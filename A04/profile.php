<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- --------------Bootstrap------------- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Profile</title>

    <style>
        th{
            font-size: 2rem;
            padding: 10px;
        }
        td{
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="changing_password.php">Change Password</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
        </div>
    </nav>

    <?php
        //include('./db_login.php');

        $id = $_SESSION['userID'];
        $query= "SELECT * FROM `profile` WHERE `u_id` ='$id'";

        if ($result = mysqli_query($connection, $query)) {
            if (mysqli_num_rows($result) <= 0) {
              //header("Location: change_profile.php");
            }else{
                while ($result_row = mysqli_fetch_row($result)) {
                    echo "<div class='container'>
                    <div class='table-responsive'>
                    <table >
                    <h2><b>Profile Information</b></h2>

                        <tr>
                            <th class='col-md-3' class='display-2'>First Name: </th>
                            <td>$result_row[2]</td>
                        </tr>
                        <tr>
                            <th class='col-md-3'>Last Name: </th>
                            <td>$result_row[3]</td>
                        </tr>
                        <tr>
                            <th class='col-md-3'>Contact Phone: </th>
                            <td>$result_row[4]</td>
                        </tr>
                        <tr>
                            <th class='col-md-3'>Contact Email: </th>
                            <td>$result_row[5]</td>
                        </tr>
                        <tr>
                            <th class='col-md-3'>City: </th>
                            <td>$result_row[6]</td>
                        </tr>
                        <tr>
                            <th class='col-md-3'>Country: </th>
                            <td>$result_row[7]</td>
                        </tr>
                    </table>
                    </div></div>";
                }
            }
        }else {
            echo "An Error has Occurred";
        }
    ?>

</body>

</html>