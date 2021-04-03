<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loged In</title>
</head>
<body>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        User_name: 
        <input type = "text" name="user_name" value=""/>
        <br> password:
        <input type = "text" name="password" value=""/>
        <br>
        <input type = "submit" value="Login"/>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
    
        echo $user_name;

        include'db_login.php';

        $query = "SELECT * FROM user_accounts WHERE col_01 = '$user_name' AND col_03 = '$password'";

        $result= mysqli_query($conn, $query); 

        if($result){
            if(mysqli_num_rows($result) <= 0){
                die("Wrong user name or password");
            }
            else {
                echo "Welcome!";
            }

            echo "<table border='1px'>";
            echo "<tr>";
            echo "<th>u_id</th>";
            echo "<th>user_name</th>";
            echo "<th>email</th>";
            echo "<th>password</th>";
            echo "</tr>";
            
            $result_row = mysqli_fetch_row($result);
           
            echo "<tr>";
            echo "<td> $result_row[0] </td>";
            echo "<td> $result_row[1] </td>";
            echo "<td> $result_row[2] </td>";
            echo "<td> $result_row[3] </td>";
            echo "</tr>";

            while($result_row = mysqli_fetch_row($result)){
                echo "<tr>";
                echo "<td> $result_row[0] </td>";
                echo "<td> $result_row[1] </td>";
                echo "<td> $result_row[2] </td>";
                echo "<td> $result_row[3] </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
         else{
            mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
    
    ?>
    
</body>
</html>