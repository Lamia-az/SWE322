<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loged In</title>
</head>
<body>
    
    <?php
    
     $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "A03";

        $conn = mysqli_connect("localhost", "root", "", "A03");

    if(!$conn){
        echo "Error No.".mysqli_connect_errno();
        echo "Error: ".mysqli_connect_error();
        exit;
    }
    include'login_action.php';
    
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
    
    $hash= password_hash($password, PASSWORD_DEFAULT);
    
    function add_user($conn, $userName, $passWord){
        
        $stmt = $conn->prepare("INSERT INTO user_accounts (User_name, Password) VALUES (?,?)");
        
        $stmt->bind_param('ss', $userName , $passWord);
       
        if(false===$stmt->execute()){
            echo ($stmt->error);
            exit();
        }
        else{
            echo "Record has been created";
        }
        $stmt->close();
    }
    Add_user($conn, $user_name, $hash);
    mysqli_close($conn);
   }
    ?>
    </body>
</html>