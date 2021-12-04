<?php
    $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

    if ($username) {
        header("Location: index.html");
        exit;
    }

    $action = empty($_POST['action']) ? '' : $_POST['action'];

    if ($action == 'do_login') {
        handle_login();
    } else {
        login_form();
    }

    function handle_login() {
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];

        if($username == "test" && $password == "pass"){
            setcookie('username', $username, 0);
            header("Location: index.html");
            exit;
        } else {
            $error = "Error: Incorrect username or password";
            require "login_form.php";
        }
    }

    function login_form() {
        $username = "";
        $error = "";
        require "login_form.php";
    }
 ?>
