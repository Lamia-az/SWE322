<?php

    function session_check(){
        session_start();
        if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
            header("Location: login.html");
          }
    }