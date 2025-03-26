<?php
   session_start();
?>
<!Doctype html>
<html>
<head>
<title>
Login
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
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($con,$_POST['email']);
         $password =mysqli_real_escape_string($con,$_POST['password']);
         $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND password='$password' ") or die("Select Erroe");
         $row = mysqli_fetch_assoc ($result);
         if(is_array($row) && !empty($row)){
            $_SESSION['valide'] = $row['Email'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['age'] = $row['Age'];
            $_SESSION['id'] = $row['ID'];
         }
         else{
            echo "<div class='message'>
            <p> Wrong Username or Password</p></div> <br>";
            echo "<a href='1page.php'><button class='btn'> go back</button></a>";
       
         }
         if(isset($_SESSION['valide'])){
            header("Location: Hauss.php");

         }
         
    }else{
    ?>
    <header>Login</header>
    <form action="" method="post">
    <div class="fiels put">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
    </div>
    <div class="fiels put">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div class="fielsinput">
        <input type="submit" class="btn" name="submit" value="Login" required>
    </div>
    <div class="links">
        Don't have account?<a href="register.php">Sign Up Now</a>
    </div>
    </form>
    
    
</div><?php } ?>
    </div>
</body></html>