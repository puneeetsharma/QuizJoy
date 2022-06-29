
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Font+Awesome+5+Free&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <title>MovieShrine</title>
</head>

<body>
    <div class="navbar">
        <ul class="nav-list">
            <div class="logo"><img src="img/logo.png" onclick="window.location.href = 'account.php';" alt="logo"></div>
            <li><a href="home.html">Home</a></li>
            <li><a href="movies.html">Take Quiz</a></li>
            <li><a href="tvseries.php">Contact</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
        </ul>
    </div>

    <section class="background firstSectionindex">
        <div class="box-main">
            <div class="firsthalf">
               
                



<?php
include "db_conn.php";

if(isset($_POST['submit'])){
    if(!empty($_POST['quizcheck']))
    {
        $count=count($_POST['quizcheck']);
        echo " Out of 5, you have selected ".$count. "options";
        $result=0;
        $i=1;
        $selected =$_POST['quizcheck'];
        //print_r($selected);

        $q = "select * from questions";
        $query = mysqli_query($con,$q);

        while($rows = mysqli_fetch_array($query))
        {
            //print_r($rows['ans_id']);
            $checked = $rows['ans_id'] == $selected[$i];

            if($checked){
                $result++;
            }
            $i++;
        }

        echo "<br> ur total result is".$result;

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        $name = $_SESSION['username'];
        $finalresult = "insert into score(username,totalquestion,anscorrect)
        values ('$name','5',$result)";
        $queryresult=mysqli_query($con,$finalresult);
    }
}
?>
<div class="buttons">
                    <button class="btn" onclick="window.location.href = 'quiz.php';">Take Quiz</button>
                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <p class="text-footer">
            Copyright &copy; 2022 - www.movieshrine.com All rights resreved
        </p>
    </footer>
</body>

</html>