$(document).ready(function(){

var contact_state=false;
var age_state=false;
var confirm_pass_state= false;
//--------------contact-----------------------------------------
    $("#contact").blur(function(){
        var contact=$('#contact').val().trim().length;
        if(contact<10){
            $('#contact').parent().addClass("form_error");
            $('#contact').siblings("span").text('contact invalid'); 
        }else{
            $('#contact').parent().removeClass("form_error");
            $('#contact').siblings("span").text('');
        }
    });

    $("#age").blur(function(){
        var age=$('#age').val();
        if(age<18 || age>60){
            $('#age').parent().addClass("form_error");
            $('#age').siblings("span").text("age should be between 18 and 60"); 
        }else{
            $('#age').parent().removeClass("form_error");
            $('#age').siblings("span").text('');
        }
    });
    

    var email_regex = new RegExp('^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$');
    var email_state=false;
    $('#email').on('blur', function(e){ 
        e.preventDefault();
        var email=$('#email').val();
        if (email == ''){
            email_state=false;
            return;
        }else if(!email_regex.test(email)){
            $.ajax({
            url:'reg_validation.php',
            type:'post',
            data:{
                'email_check':1,
                'email':email,
            },
            success: function(response){
                if ($.trim(response) === 'taken' ) {
                    email_state = false;
                    $('#email').parent().removeClass("form_error");
                    $('#email').parent().addClass("form_error");                                 
                    $('#email').siblings("span").text('E-mail already exists');
                }else if ($.trim(response) ==='not taken') {
                        email_state=true;
                        $('#email').parent().removeClass("form_error");
                        $('#email').siblings("span").text('');
                    }
                    }
            })
        }else{
            $('#email').parent().addClass("form_error");
            $('#email').siblings("span").text("enter valid email");
        }   
    });

    var pass_regex=new RegExp('^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$')
    $("#pass").blur(function(){
        (email_state);
        var pass=$('#pass').val().trim()
        if(!pass_regex.test(pass)){
            $('#pass').parent().addClass("form_error");
            $('#pass').siblings("span").text("Password should contain atleast 1 special character and 1 number"); 
        }else{
         $('#pass').parent().removeClass("form_error");
         $('#pass').siblings("span").text('');
        }
    });

    $("#confirm_pass").blur(function(){
        var confirm_pass=$('#confirm_pass').val();
        var pass=$('#pass').val();
        if(pass!=confirm_pass){
            confirm_pass_state=false;
            $('#confirm_pass').parent().addClass("form_error");
            $('#confirm_pass').siblings("span").text("password does not match"); 
        }else{
            confirm_pass_state=true;
            $('#confirm_pass').parent().removeClass("form_error");
            $('#confirm_pass').siblings("span").text('');
        }
    });


    
})
