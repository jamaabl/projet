<?php
  
  session_start();

   include("php/config.php"); 

    if(!isset($_SESSION['valide'])){
    header("Location: 1page.php");}

?>
<!Doctype html>
<html>
<head>
<title>
changer profile
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylepade1.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="right-links">
            <a href="#">Changer Profile</a>
            <a href="php/logout.php"><button class="btn">Log out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
             if(isset($_POST['submit'])){
                $username =$_POST['username'];
                $email =$_POST['email'];
                $age =$_POST['age'];
                $id = $_SESSION['id'];
                $edit_query = mysqli_query($con,"UPDATE users SET  Username='$username', Email='$email', Age='$age' WHERE ID=$id ") or die ("error occurred");
               if($edit_query) {
                
            echo "<div class='message'>
            <p> Profile Update</p></div> <br>";
            echo "<a href='Hauss.php'><button class='btn'>Go Home</button></a>";
           
               }
            }
            else{
                $id =$_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE ID=$id");
                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                   
                }
            
            ?>
            <header>changer Profile</header>
            <form action="" method="post">
            <div class="fiels put">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $res_Uname  ;?>"  autocomplete="off" required>
            </div>
            <div class="fiels put">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $res_Email  ;?>" autocomplete="off "required>
            </div>
            <div class="fiels put">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="<?php echo $res_Age ;?>" autocomplete="off" equired >
            </div>
            
            <div class="fielsinput">
                <input type="submit" class="btn" name="submit" value="Update" required>
            </div>
            </form>
            
        </div><?php } ?>
            </div>
</body>
</html>