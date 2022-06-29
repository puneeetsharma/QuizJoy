<?php
include "db_conn.php";
?>

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
            <li><a href="home.php">Home</a></li>
            <li><a href="quiz.php">Take Quiz</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </div>

    <section class="background firstSectionindex">
        <h1 class="heading"> Computer Science Quiz </h1>

        <div class="card">

            <h3 class="card header"> Welcome
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                echo $_SESSION['username'];
                ?>
                You have To select only one out of 4. Best of luck!
            </h3>
        </div><br>
        <div class="fullcard">
            <form action="check.php" method="post">
                <?php

                for ($i = 1; $i < 6; $i++) {
                    $q = "Select * from questions where qid=$i";
                    $query = mysqli_query($con, $q);

                    while ($rows = mysqli_fetch_array($query)) {
                ?>
                        <div class="card">
                            <h4 class="card-header">
                                <?php echo $rows['question'] ?>
                            </h4>
                            <?php
                            $q = "Select * from answers where ans_id=$i";
                            $query = mysqli_query($con, $q);

                            while ($rows = mysqli_fetch_array($query)) {
                            ?>
                                <div class="card-body">
                                    <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid'] ?>">
                                    <?php echo $rows['answer']; ?>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <input type="submit" name="submit" class="btn" Value="Submit">
            </form>
        </div>
        </div>
    </section>

    <footer>
        <p class="text-footer">
        Copyright &copy; 2022 - www.quizjoy.com All rights resreved
        </p>
    </footer>
</body>

</html>