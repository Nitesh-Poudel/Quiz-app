<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email;

    if ($email == "admin" && $password == "admin") {
        header("Location: dasboard.php");
        exit; // It's good practice to include an exit statement after a header redirect
    } else {
        header("Location: http://localhost:89/quizApp/Loksewa_tayari.html");
        exit;
    }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loksewa-Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/quiz.css">
</head>
<style>
    #msg1{
        font-size:10px;
        color:red;
    }
</style>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">


            </div>
          
        </div>
        <div class="form">
            <form name="myform" onsubmit="return validateForm()" action="login.php" method="Post"  >
                <div class="title">Login</div>
              
                <input type="text" placeholder="Email or Username" class="inputs" name="email" id="email"><br>
                <input type="password" placeholder="Password" class="inputs" name="password" id="password"><br>
            
                <div class="button_sanga">
                    <div class="button">  <button type="submit" name="submit" id="submit">Login</button></div>
                    <div class="link">Don't have an Account? <a href="registration.html">Register</a></a></div>

                </div>
                <p id="msg1"><?php if($msg1=="Email and password not matched"){echo $msg1;} else{
                    echo "";}?></p>

            </form>
        </div>
    </div>


    <script>
        function validateForm(){
          
            var email = document.forms["myform"]["email"].value;
            var password = document.forms["myform"]["password"].value;
           
            
            
           if(email==""||password==""){
           
                alert("Please enter both email and password");
                return false;


              
           }


        }
               
    </script>
    
</body>
</html>