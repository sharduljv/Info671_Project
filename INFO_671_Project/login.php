<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style> label {color:graytext} </style>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
            
            debugger;
            function validateEmail() {
                var x = document.forms["loginForm"]["userName"].value;
                var atpos = x.indexOf("@");
                var dotpos = x.lastIndexOf(".");
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                    alert("Not a valid e-mail address");
                return false;
                }
            }

            function validateSignUpForm() {
                var first_name = document.forms["signUpForm"]["firstName"].value;
                var last_name = document.forms["signUpForm"]["lastName"].value;
                var insurance_company = document.forms["signUpForm"]["insuranceCompany"].value;
                var insurance_type = document.forms["signUpForm"]["insuranceType"].value;
                var e_id = document.forms["signUpForm"]["eMailID"].value;
                var atpos = e_id.indexOf("@");
                var dotpos = e_id.lastIndexOf(".");
                var pass = document.forms["signUpForm"]["password"].value;
                var pass_confirm = document.forms["signUpForm"]["confirmPassword"].value;
                if (first_name == "") {
                    alert("First Name must be filled out");
                    return false;
                }
                else if (last_name == "") {
                    alert("Last Name must be filled out");
                    return false;
                }
                else if (insurance_company == "") {
                    alert("Insurance Company Name must be filled out");
                    return false;
                }
                else if (insurance_type == "") {
                    alert("Insurance Type must be filled out");
                    return false;
                }
                else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=e_id.length) {
                    alert("Not a valid e-mail address");
                    return false;
                }
                else if(pass == "" && pass_confirm == "" && pass != pass_confirm) {
                    alert("Passwords do not match");
                    return false;            
                }
            }
        </script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" >
    </script>
    
    </head>
    <body>
        <div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%;'>
            <img src='shutterstock_128456363.jpg' style='width:100%;height:100%' alt='[]' />
        </div>
        <form name="loginForm" action="DisplayMap.php" onsubmit="return validateEmail()" method="post">
            <div class="col-sm-offset-1 col-sm-3" style = "margin-top:150px; color: grey">
                <h1 style="color: background;font-family: Arial"> Login </h1>
                <div>
                    <label for="userName">User Name</label>
                    <input type="text" name="userName" class="form-control" id="exampleInputEmail1" placeholder="e.g. someone@something.com">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="******">
                </div>
                <div style = "margin-top:10px">
                    <input class="btn btn-default"  type="submit" value="Login"> 
                </div>
            </div>
        </form>
        <form name="signUpForm" action="insertUser.php" onsubmit="return validateSignUpForm()" method="post">
            <div class="col-sm-offset-3 col-sm-4">
                <h1 style="color: background;font-family: Arial"> Sign Up </h1>
                <div>
                    <label for="firstName"> First Name</label>
                    <input type="text" name="firstName" class="form-control" placeholder="e.g John">
                </div>
                <div>
                    <label for="lastName"> Last Name</label>
                    <input type="text" name="lastName" class="form-control" placeholder="e.g Smith">
                </div>
                <!--<div>
                    <label for="birthDate"> Birth Date</label>
                    <input type="text" name="birthDate" class="form-control" placeholder="e.g mm/dd/yyy">
                </div>-->
                <div>
                    <label for="birthDate"> Birth Date</label>
                    <input type="text" name="birthDate" id="datepicker" class="form-control" placeholder="e.g mm/dd/yyy">
                    <!--<p>Date: <input type="text" id="datepicker"></p>-->
                </div>
                <div>
                    <label for="insuranceCompany"> Insurance Company</label>
                    <input type="text" name="insuranceCompany" class="form-control" placeholder="e.g PSI">
                </div>
                <div>
                    <label for="insuranceType"> Insurance Type</label>
                    <input type="text" name="insuranceType" class="form-control" placeholder="e.g GOLD">
                </div>
                <div>
                    <label for="eMailID"> E-Mail ID</label>
                    <input type="text" name="eMailID" class="form-control" placeholder="e.g someone@something.com">
                </div>
                <div>
                    <label for="password"> Enter Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="******">
                </div>
                <div>
                    <label for="confirmPassword"> Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="******">
                </div>
                <div style = "margin-top:10px">
                    <input class="btn btn-default"  type="submit" value="Sign Up"> 
                </div>
            </div>
    </body>
</html>
