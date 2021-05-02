<?php
        session_start();
        include 'connection.php';

        if (isset($_REQUEST["login"])) {

            $username= $_POST['username'];
            $userpass = MD5($_POST['password']);
            
            $numrows = $pdo->query("select count(*) from user_accounts where user_name='$username' && password='$userpass'")->fetchColumn(); 
            

            if ($numrows == 1) {
                $_SESSION['username'] = $username;
                $numrows2 = $pdo->query("select count(*) from profile where user_id='$username'")->fetchColumn();
                if($numrows2 ==1){
                    $_SESSION['yesprofile']="Yes";
                }
                else{
                    $_SESSION['noprofile']="No";
                } 
                header('location:home.php');
            } 
            else {
                $_SESSION['error'] = "Wrong Username/Password. Try again";
                header('location:Login.php');
                exit;
            }
            
        }


?>