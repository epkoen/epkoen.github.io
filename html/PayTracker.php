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
        <title>Add Paycheck</title>
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
                // code from https://www.w3docs.com/snippets/javascript/how-to-get-the-current-date-and-time-in-javascript.html
                let currentDate = new Date()
                var months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                let cMonth = months[currentDate.getMonth()];
                let cYear = currentDate.getFullYear();
                var cDay;
                if(currentDate.getDate() < 10){
                    cDay = "0" + currentDate.getDate();
                } else {
                    cDay = currentDate.getDate();
                }
                let todayDate = cYear + "-" + cMonth + "-" + cDay;
                // end of code from https://www.w3docs.com/snippets/javascript/how-to-get-the-current-date-and-time-in-javascript.html
                document.getElementById('ppstart').max = todayDate;
                document.getElementById('ppend').max = todayDate;
                document.getElementById('pdate').max = todayDate;
            });
        </script>
    </head>
    <body>
        <div id="navbar"></div>
        <div class="wrapper">
            <form id="dataForm" action="action.php" method="post" onsubmit="return validateForm();">
                <label for="gpay">Gross Pay:</label><br>
                <input type="number" id="gpay" name="gpay" value="$" min="0" step=".01" required><br>
                <label for="tax">Taxes:</label><br>
                <input type="number" id="tax" name="tax" value="$" min="0" step=".01" required><br>
                <label for="tips">Tips:</label><br>
                <input type="number" id="tips" name="tips" value="$" min="0" step="0.01" required><br>
                <label for="ppstart">Pay Period Start:</label><br>
                <input type="date" id="ppstart" name="ppstart" required><br>
                <label for="ppend">Pay Period End:</label><br>
                <input type="date" id="ppend" name="ppend" required><br>
                <label for="pdate">Pay Date:</label><br>
                <input type="date" id="pdate" name="pdate" required><br>
                <label for="source">Source of Income:</label><br>
                <input type="text" name="source" placeholder="Company Name" maxlength="300" required ><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
