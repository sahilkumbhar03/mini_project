<?php

 
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        
    </head>
    
    <body>
        <div class='reg_form'>
            <h1>---- Registration form------</h1>
            <form action="reg_validation.php" method="POST" enctype="multipart/form-data"  name="reg_form" >
                <div id="error_msg"></div>
                <div class='same_line'>
                    <input type="text" name="fname" placeholder="First Name" id="fname" required><br>
                    <span></span>
                </div>
                <div class='same_line'>
                    <input type="text" name="lname" placeholder="Last Name"  id="lname" required><br>
                    <span></span>
                </div><br>
                <div class='same_line'>
                    <input type="number" name="contact" placeholder="Contact No." id="contact" required><br>
                    <span></span>
                </div>
                <div class='same_line'>
                    <input type="number" name="age"  placeholder="Age" id="age" required><br>
                    <span></span>
                </div>
                <div class="margin_space">
                    <input type="email" name="email" class="size" placeholder="E-mail" id="email" required><br>
                    <span></span>
                </div>
                <div class="margin_space">
                    <input type="password" name="pass" class="size" placeholder="Password" id="pass" required><br>
                    <span></span>
                </div>
                <div class="margin_space">
                    <input type="password" name="c_pass" class="size" placeholder="Confirm Password" id="confirm_pass" required>
                    <span></span>
                </div>
                <div class="margin_space">
                    Upload Image: <input type="file" name="profile_photo" id="profile_photo" required >
                    <span></span>
                </div>
                <input type="submit" class="size margin_space" id="submit_btn" name="submit" onclick="return validate()">
            
            </form>
        </div>
        

    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="reg_user.js"></script>

<script>
    function validate(){
        var confirm_pass=$('#confirm_pass').val();
        var pass=$('#pass').val();
        if(pass!=confirm_pass){
            return false;
        }else{
            return true;
        }

    }
</script>

