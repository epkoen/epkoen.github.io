<?php
    $servername = "localhost";
    $sqluser = "root";
    $sqlpwd = "root";
    $dbname = "finalProject";

    $gpay = $_POST['gpay'];
    $tax = $_POST['tax'];
    $tips = $_POST['tips'];
    $npay = $gpay - ($tax + $tips);
    $ppstart = $_POST['ppstart'];
    $ppend = $_POST['ppend'];
    $pdate = $_POST['pdate'];
    $source = addslashes($_POST['source']);
    // code from https://www.w3schools.com/php/php_mysql_connect.asp
    $conn = new mysqli($servername, $sqluser, $sqlpwd, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // end of code from https://www.w3schools.com/php/php_mysql_connect.asp
    // code from https://www.w3schools.com/php/php_mysql_insert.asp
    $sql = "INSERT INTO PayData (GrossPay, Tax, Tips, NetPay, PPStart, PPEnd, PDate, Src)
            VALUES ($gpay, $tax, $tips, $npay, '$ppstart', '$ppend', '$pdate', '$source');";

    if ($conn->query($sql) === TRUE) {
      header("Location: PayTracker.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    // end of code from https://www.w3schools.com/php/php_mysql_insert.asp
?>
