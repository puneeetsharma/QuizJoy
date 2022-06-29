<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="navbar">
            <div class="logo"><img src="img/logo.png" onclick="window.location.href = 'home.html';" alt="logo"></div>
        </div>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="signup.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button type="submit" name="signup">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="login.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" id="email" placeholder="Email" required="">
					<input type="password" name="pswd" id="pswd" placeholder="Password" required="">
					<button type="submit" name="login">Login</button>
				</form>
			</div>
	</div>
</body>
</html>





<?php
session_start();
if(isset($_POST['login'])){
    $server = "localhost";
    $username="root";
    $password="";
    $db="quizdatabase";
    $con = mysqli_connect($server,$username,$password,$db);
    if(!$con){
        die("connection to this database faild due to".mysqli_connect_error());
    }
    //echo "Success connecting to db";
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = "select * from quizdatabase.user where email='$email' && pswd='$pswd'";
    $sql1="select username from quizdatabase.user where email ='$email'";
     //echo $sql;
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)>0)
      {
           while($row=mysqli_fetch_assoc($result1))
           {
            $uname= $row['username'];
           }
        }
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        $_SESSION['email']= $email;
        $_SESSION['username']=$uname;
        header('location:home.php');
    }
    else{
        header('location:signup.php');
    }



    if($con->query($sql) == true)
    {
        ?>
        <script>
        alert( "Login Successful");
        </script>
        <?php
    }
    else{
        ?>
        <script>
         alert( "ERROR: $sql <br> $con->error");
         </script>
        <?php
    }
}
if(isset($_POST['log'])){
    echo $_SESSION['email'];
}
?>