
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="login_style.css">
    </head>
    <body>
        <div class="login_form">
            <h2>Login Form</h2>
            <div id="error_msg"><?php echo $error_msg;?></div>
            <form action="login_validation.php" method="POST">
                <div class='same_line'>
                    <input type="text" name="email" id="email" placeholder="E-mail" required><br>
                    <span></span>
                </div><br>
                <div class='same_line'>
                    <input type="password" name="pass" id="pass" placeholder="Password" required><br>
                    <span></span>
                </div><br>
                <input type="submit" class="size margin_space" id="submit_btn">
    
            </form>
        </div>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="login_check.js"></script>