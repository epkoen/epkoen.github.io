<?php
// Code from lecture 24
    $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

    if(!$username){
        header("Location: login_form.php");
        exit;
    }
// end of code from lecture 24
    $servername = "localhost";
    $sqluser = "root";
    $sqlpwd = "root";
    $dbname = "finalProject";

    $start = $_GET['start'];
    $end = $_GET['end'];
    // code from https://www.w3schools.com/php/php_mysql_connect.asp
    $conn = new mysqli($servername, $sqluser, $sqlpwd, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // end of code from https://www.w3schools.com/php/php_mysql_connect.asp
    if ($start == null && $end == null){
        $query = "SELECT id, PDate, NetPay, Src FROM PayData";
     } else if ($start != null && $end == null) {
        $query = "SELECT id, PDate, NetPay, Src FROM PayData WHERE PDate >= '$start'";
    } else if ($start == null && $end != null) {
        $query = "SELECT id, PDate, NetPay, Src FROM PayData WHERE PDate <= '$end'";
    } else if ($start != null && $end != null) {
        $query = "SELECT id, PDate, NetPay, Src FROM PayData WHERE PDate BETWEEN '$start' AND '$end'";
    }
    $result = $conn->query($query);
    $conn->close();
 ?>
 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8">
         <title>Payment History</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
         <link rel="preconnect" href="https://fonts.gstatic.com">
         <link href="https://fonts.googleapis.com/css2?family=Anton&family=Ubuntu&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="../css/PayTracker.css" type="text/css">
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
        <table class="table" id="displayHistory">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pay Date</th>
                    <th scope="col">Net Pay</th>
                    <th scope="col">Source of Income</th>
                </tr>
            </thead>
            <tbody>
<?php
    // Code from https://www.codeandcourse.com/how-to-display-database-data-in-html-table/
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["PDate"] . "</td><td>". $row["NetPay"]. "</td><td>". $row["Src"]. "</td></tr>";
    }
    // End of code from https://www.codeandcourse.com/how-to-display-database-data-in-html-table/
?>
            </tbody>
        </table>
     </body>
 </html>
