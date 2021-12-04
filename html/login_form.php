<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login - PayTracker</title>
        <link href="../jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../css/PayTracker.css" type="text/css">
        <script src="../jquery-ui-1.12.1/external/jquery/jquery.js"></script>
        <script src="../jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <!-- Code from Lecture 24  -->
        <script>
            $(function() {
                $("input[type=submit]").button();
            });
        </script>
    </head>
    <body>
            <div id="loginWidget" class="ui-widget">
                <h1 class="ui-widget-header">Login</h1>
                <?php
                    if ($error) {
                        print "<div class=\"ui-state-error\">$error</div>\n";
                    }
                 ?>

                <form action="login.php" method="post">
                    <input type="hidden" name="action" value="do_login">

                    <div class="stack">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>">
                    </div>

                    <div class="stack">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all">
                    </div>

                    <div class="stack">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
    </body>
</html>
