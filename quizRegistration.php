<?php
include_once('databaseConnection.php');
if(isset($_POST['submit'])){
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    if($password==$cpassword){


        $sql="INSERT INTO person(name,email,password) VALUES('$name','$email','$password')";
        $qry=mysqli_query($conn,$sql)or die("Data insert Error");

        if($qry){
           header("Location:login.php");
        }

        
    }


    

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loksewa-Registration</title>
    <link rel="stylesheet"href="reg1.css">
</head>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">


            </div>
          
        </div>
        <div class="form">
            <form action="" name="myform" onsubmit="return validateForm()" method="post">
                <div class="title">Register</div>
                <input type="text" placeholder="Full name" class="inputs" name="fullname"><br>
                <input type="text" placeholder="Email or Username" class="inputs" name="email"><br>
                <input type="password" placeholder="Password" class="inputs" name="password"><br>
                <input type="password" placeholder="Conform Password" class="inputs" name="cpassword"><br>
                <div class="button_sanga">
                    <div class="button">  <button type="submit" name="submit" id="submit">Register</button></div>
                    <div class="link">Already have account? <a href="login.html">Login</a></a></div>

                </div>
                <div class="msg"><p id="error">  </p></div>

           
            </form>
        </div>
    </div>
    <script>
        function validateForm(){
            var name = document.forms['myform']["fullname"].value;
            var email = document.forms["myform"]["email"].value;
            var password = document.forms["myform"]["password"].value;
            var cpassword = document.forms["myform"]["cpassword"].value;
            
           if(name==""||email==""||password==""||cpassword==""){
                document.getElementById("error").innerHTML="Please enter every detail";
                alert("Please enter every detail");
                return false;
            }

            if(password!=cpassword){
                alert("Paswword not matched");
                return false;
           }

           if (/^[a-zA-Z]+$/.test(name)!=true) {
            alert("Name can content only alphabets");
            return true;
   
            }

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)!=true){
                alert("Not a email");
            return false;
            }

            //Password validation need more then 4 character
            var pLength=password.length;
            if(pLength<=4){
                alert("password too short");
                return false;
            }
 
         
           
        }

    </script>
    
</body>
</html>