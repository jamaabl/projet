<!Doctype html>
<html>
<head>
<title>
register
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylepade1.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="container">
<div class="box form-box">
  
<?php
include("php/config.php");
$showForm = true;
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
    if(mysqli_num_rows($verify_query) != 0){
            echo "<div class='message'>
            <p> this email is used,try anather one please!</p></div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'> go back</button></a>";
        }
        else {
            mysqli_query($con, "INSERT INTO users (Username, Email, Age, password) VALUES ('$username','$email','$age','$password')") or  die("Errore accunt" . mysqli_error($con));
       
            echo "<div class='message'>
            <p> registation successfully</p></div> <br>";
            echo "<a href='1page.php'><button class='btn'>login now</button></a>";
            $showForm = false;
        }
}
else{
    
  
?>  
    <header>Sing Up</header>
    <form action="" method="post">
    <div class="fiels put">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" autocomplete="off" required>
    </div>
    <div class="fiels put">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"  autocomplete="off "required>
    </div>
    <div class="fields put">
        <label for="age">Age</label>
        <input type="number" name="age" id="age"  autocomplete="off" required >
    </div>
    <div class="fields put">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="off" required>
    </div>
    <div class="fielsinput">
        <input type="submit" class="btn" name="submit" value="Register" required>
    </div></form>
    <div class="links">
        Already a member?<a href="1page.php">Sign In</a>
    </div>
</div>
<?php } ?>
    </div>
</body></html>