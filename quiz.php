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
               <h1 class="heading"> Computer Science Quiz </h1>
               <div class= "card" >
                <h3> Welcome  <?php echo $_SESSION['username']; ?> You have To select only one out of 4. Best of luck! </h3>
    </section>
    
    <footer>
        <p class="text-footer">
            Copyright &copy; 2022 - www.movieshrine.com All rights resreved
        </p>
    </footer>
</body>

</html>

