<?php


// Initialize the $qn variable

if(isset($_POST['submit'])){
    $question = $_POST['question'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $rightAnswer=$_POST['rightAnswer'];

    //connecting to data base:
    include_once('databaseConnection.php');

    //give message if connection not sucess and .
    if(!$conn){
        echo 'Cannot  connect to databse'or die;
         }
    else{
    $sql="INSERT INTO questions(question,option1,option2,option3, option4) values('$question','$rightAnswer','$option1','$option2','$option3')";
     
    $qry=mysqli_query($conn,$sql)or die("Data insert Error");
       
    mysqli_close($conn);
    }

}
//echo $question.$option1.$option2.$option3.$rightAnswer;     Checking 





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Questons</title>
    <link rel="stylesheet"href="css/style.css">
    <link rel="stylesheet" href="css/quiz.css">
    <style>
        .msg{
            color:red;
            font-size:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">
          

            </div>
          
        </div>
        <div class="form">
            <form action="" name="myform" onsubmit="return validateForm()" method="post">
                <div class="title">Questions</div>
                <input type="text" placeholder="Write question" class="inputs" name="question"><br>
                
                <input type="text" placeholder="Right Answer" class="inputs" name="rightAnswer"><br>
                <input type="text" placeholder="option1" class="inputs" name="option1"><br>
                <input type="text" placeholder="option2" class="inputs" name="option2"><br>
                <input type="text" placeholder="option3" class="inputs" name="option3"><br>
                <div class="button_sanga">
                    <div class="button">  <button type="submit" name="submit" id="submit">Submit</button></div>
                    <div class="link"> <a href="dasboard.php">Go to dashboard?</a></div>

                </div>
                <div class="msg"><p id="error"> </p></div>

           
            </form>
        </div>
    </div>
    <script>
        function validateForm(){
            var question = document.forms['myform']["question"].value;
            var option1 = document.forms["myform"]["option1"].value;
            var option2 = document.forms["myform"]["option2"].value;
            var option3 = document.forms["myform"]["option3"].value;
            var rightAnswer= document.forms["myform"]["rightAnswer"].value;
            
           if(question==""||option1==""||option2==""||option3=="" ||rightAnswer==""){
                document.getElementById("error").innerHTML="Please enter every detail";
               
                return false;
            }

          
 
          

           
        }

    </script>
    
</body>
</html>