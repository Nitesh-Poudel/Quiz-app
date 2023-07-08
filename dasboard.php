



<?php

$randomQuestion = mt_rand(9,17);


$randomOption1 =mt_rand(1,4);
$randomOption2 =mt_rand(1,4);
$randomOption3 =mt_rand(1,4);
$randomOption4 =mt_rand(1,4);


while ($randomOption2 == $randomOption1) {
    $randomOption2 = mt_rand(1, 4);
}

while ($randomOption3 == $randomOption1 || $randomOption3 == $randomOption2) {
    $randomOption3 = mt_rand(1, 4);
}

while ($randomOption4 == $randomOption1 || $randomOption4 == $randomOption2 || $randomOption4 == $randomOption3) {
    $randomOption4 = mt_rand(1, 4);
}

include_once('databaseConnection.php'); 
$sql="SELECT * FROM questions WHERE id=$randomQuestion" ;
$result=mysqli_query($conn,$sql);
    if($result){
        $data=mysqli_fetch_assoc($result);
    }


  
?>

<?php
$msggg='';
if(isset($_POST['ansButton'])){
    $msggg="Hello World";
   
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/quiz.css">
    <style>
      
    </style>
</head>

<body>
    <form action="" name="questionAnswers" method="POST">
    <div class="container">
        <h1>प्रश्नोत्तरी</h1>
        <div class="question">
            <h3>Qn.<?php echo $data['question']; ?></h3>
        </div>

    
        <div class="timer">
           <h7 id="timer"> 8sec</h7>
        </div>
        <div class="row">
            <button type="submit" class="gnbtn" id="gnbtn" name="ansButton"><?php echo $data['option'.$randomOption4]?></button>
    
        </div>


        <div class="row">
            <button type="submit" class="gnbtn" id="gnbtn" ><?php echo $data['option'.$randomOption3]?></button>
    
        </div>

        <div class="row">
            <button type="submit" class="gnbtn" id="gnbtn" ><?php echo $data['option'.$randomOption2]?></button>
    
        </div>

        <div class="row">
            <button type="submit" class="gnbtn" id="gnbtn" ><?php echo $data['option'.$randomOption1]?></button>
    
        </div>
       
        <?php echo $msggg?>
     
    </div>
</form>


    <script >
        window.onload = function() {
            var seconds = 8; // Initial value of the counter

            var timer = setInterval(function() {
                document.getElementById('timer').innerHTML = 'Time: ' + seconds + ' sec';

                seconds--; // Decrement the counter value

                if (seconds < 0) {
                    clearInterval(timer); // Stop the timer when it reaches 0
                    document.getElementById('timer').innerHTML = 'Time\'s up!';
                    location.reload(); // Refresh the page
                }
            }, 1000); // Update every 1 second (1000 milliseconds)
        };

    </script>
</body>
</html>