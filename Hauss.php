
<?php
  
  session_start();

   include("php/config.php"); 
  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="hausstyle.css">
   
    <!--------INCONSCOUT-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
<nav>
    <div class="logo-name">
        <div class="logo-image">
        <img src="logo.jpg" alt="">
    </div>
<span class="logo_name">
    Gestion_Projet
</span>
</div>
<div class="menu-it">
<ul class="nav-links">
    <li class="a"><a href="#" >
        <i class="uil uil-estate"></i>
        <span class="link-name" onclick="toggleHome()">Home</span>

    </a></li>
    <li class="a"><a href="tableaux.php">
        <i class="uil uil-files-landscapes"></i>
        <span class="link-name">Tableaux</span>

    </a></li>
    <li class="a"><a href="creer_tableau.php" >
        <i class="uil uil-create-dashboard"></i>
        <span class="link-name" >Ajouter</span>

    </a></li>
    <li class="a">
    <a href="invite.php" id="membres-link">
    <i class="uil uil-users-alt"></i>
        <span class="link-name">Membres</span>
    </a>
</li>
    <li class="a"><a href="#">
        <i class="uil uil-estate"></i>
        <span class="link-name">Recent</span>

    </a></li>
    <li class="a"><a href="#">
        <i class="uil uil-favorite"></i>
        <span class="link-name">Favorite</span>

    </a></li>
</ul>
<ul class="logout-mod">
    <li class="a"><a href="1page.php">
        <i class="uil uil-signout"></i>
        <span class="link-name" >Log_out</a></span>

    </a></li>
    <li class="mode"><a href="#">
        <i class="uil uil-moon"></i>
        <span class="link-name">Dark Mode</span>

    </a>
<div class="mode-toggle">
    <span class="switch">

    </span>
</div></li>
</ul>

</div>
</nav>
<section class="dashboard">
    <div class="top">
 

        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div>
        <img src="profile.jpg" onclick="toggleProfile()">
    </div>
    </div>
    <div class="sub-menu">
        <div class="wrap" id="profileMenu">
            <div class="menu">
                <div  class="info">
                <?php
            $id= $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE ID =$id");
            while($result =mysqli_fetch_assoc($query)){
                $res_Uname = $result[ 'Username'];
                $res_Email = $result[ 'Email'];
                $res_Age = $result[ 'Age'];
                $res_ID = $result[ 'ID'];
            }?>
                    <p class="sty" id="profilName">Nom : <span id="displayName"> <?php echo $res_Uname ?></span><p>
                        <p class="sty" id="profileEmail">Email : <span id="displayEmail"><?php echo $res_Email ?></span></p>
                        
                        <p class="sty" id="profileEmail">age: <span id="displayEmail"><?php echo $res_Age?></span></p>
                        
                        <p class="sty" id="profileEmail">tele : <span id="displayEmail">06578393</span></p>
                    
                
                <hr>
              
                <?php
         
         echo "<a href='edit.php?ID=$res_ID' class='menu-link'><p>Changer de compte</p><span>></span></a>";
         ?>
                   

                <a href="#" class="menu-link" onclick="manageAccount()">
                    <p>Gérer le compte</p>
                    <span>></span>
                </a>
                       <a href="#" class="menu-link">
                    <p>Créer un espace de travail</p>
                    <span>></span>
                </a>
           
            <a href="#" class="menu-link">
         <p>Aide</p>
         <span>></span>
     </a>
     <a href="#" class="menu-link">
        <p>Parametre</p>
        <span>></span>
       </a>
    
    <a href="#" class="menu-link">
 <p>Ressources</p>
 <span>></span>
</a>
            </div>
        </div>
    </div>
 
    
    

    


               

        
</section>



<script src="script.js"></script>
   <script> /*
   function toggleProfile() {
    let profileMenu = document.getElementById("profileMenu");
    if (profileMenu) {
        profileMenu.classList.toggle("open-menu");
    }
}
function toggleHome(){

 let profileMenu = document.getElementById("profileMenu");

        profileMenu.classList.remove("open-menu");}
    

*/
document.addEventListener("DOMContentLoaded", function () {
    const profileImage = document.querySelector(".top img");
    const profileMenu = document.getElementById("profileMenu");

    if (profileImage && profileMenu) {
        profileImage.addEventListener("click", function () {
            profileMenu.classList.toggle("open-menu");
        });

        // Fermer le menu si on clique en dehors
        document.addEventListener("click", function (event) {
            if (!profileMenu.contains(event.target) && event.target !== profileImage) {
                profileMenu.classList.remove("open-menu");
            }
        });
    }
});




</script>
</body></html>