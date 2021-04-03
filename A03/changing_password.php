<html>
    <head>
        <title>Change password</title>
    </head>
    <body>
        <h2>Change password</h2>
        <form action="" method="post">
            <p>
                <label for="current_password">Your current password</label>
                <br>
                <input type="password" name="current_password" id="current_password" />
                <br>
                <label for="new_password">Your new password</label>
                <br>
                <input type="password" name="new_password" id="new_password" />
                <br>
             <button type="submit">Change password</button>
            </p>   
        </form>
        
        <?php
    session_start();
     
    if(!isset($_SESSION['userID']) ){
        include 'login_action.php';
    }
    if(!empty($_POST)){
   $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        
         $check_current_password = trim($current_password);
        $check_new_password = trim($new_password);

        if($check_current_password != '' && $check_new_password != ''){

    $database_host = 'localhost';
    $database_user = 'root';
    $database_password = '';
    $database = 'A03';
     
    $mysqli = new mysqli($database_host, $database_user, $database_password, $database);
     
    $current_password = $mysqli->real_escape_string($current_password);
    $new_password = $mysqli->real_escape_string($new_password);
     
    $mysqli->close();
}
        else {
            $error = 'Please provide both your current password and your new password.';
        }}
?>
         
    </body>
</html>