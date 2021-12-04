<?php
// Code from lecture 24
    $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

    if(!$username){
        header("Location: login_form.php");
        exit;
    }
// end of code from lecture 24
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Payment History</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/PayTracker.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../JS/PayTracker.js"></script>
        <script>
            $(function(){
                $.get("nav.html", function(data){
                    $("#navbar").replaceWith(data);
                });
            });
        </script>
    </head>
    <body>
        <div id="navbar"></div>
        <div class="wrapper">
            <form action="history.php" method="get" onsubmit="return validatePayHistory();">
                <label for="start">Start Date:</label>
                <input type="date" id="start" name="start">
                <label for="end">End Date:</label>
                <input type="date" name="end" id="end">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
