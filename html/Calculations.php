<?php
// Code from lecture 24
    $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

    if(!$username){
        header("Location: login_form.php");
        exit;
    }
// end of code from lecture 24
    // code from https://www.w3schools.com/php/php_mysql_connect.asp
    $servername = "localhost";
    $sqluser = "root";
    $sqlpwd = "root";
    $dbname = "finalProject";
    $conn = new mysqli($servername, $sqluser, $sqlpwd, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // end of code from https://www.w3schools.com/php/php_mysql_connect.asp
    $result = $conn->query("SELECT NetPay FROM PayData");
    $conn->close();
    $rowcount = mysqli_num_rows($result);
    $sum = 0;
    while ($row = $result->fetch_assoc()){
        $sum = $sum + $row['NetPay'];
    }
    $average = round($sum / $rowcount, 2);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculations</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/PayTracker.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <p>Average Weekly Pay</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <p>Total Pay Entered</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <?php
                            echo '<p>$' . $average . '</p>';
                         ?>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <?php
                            echo '<p>$' . $sum . '</p>';
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
