<?php
                   $conn=new mysqli("localhost","root","","globe_login");
                   $c="SELECT user FROM login_info WHERE email='$email'";
                   $result=mysqli_query($conn,$c);
                   while ($row=mysqli_fetch_array($result)){
                    $username=$row["user"];
                   }
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pract.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="iconimage\logo1-Photoroom.png"  alt="Logo"></div>
            <div class="text">Cool The Globe</div>
        
        <div class="tabs">
            <a href="http://localhost/Tutorial/home.php">Home</a>
            <a href="http://localhost/project/promises.php">Promises</a>
            <a href="http://localhost/Tutorial/gallary.php">Gallery</a>
            <a href="http://localhost/Tutorial/about.php">About</a>
        </div>
        <div class="dropdown">
            <button><img id = "menu" src="iconimage/menu.png"></button>
            <div class="dropdown-content">
                <a href="#">Login</a>
                <a href="#">Logout</a>
                <a href="#">My Score</a>
            </div>
        </div>
    </div>

    <div class="banner-container">
        <div class="banner-image">
            <img id="slide" src="welcome.jpeg" alt="Banner Image">
        </div>
        <div class="subtitle-container">
            <h1>
                <form action="sign_up.php" method="post">
                <?php echo "Hey"." ". $username; ?>
            </h1>
            <p>Let's start your journey to save earth...!!!</p>
        </div>
    </div>

    <div class="container">
        <div class="box vehicle">
            <a href="http://localhost/project/vehicle.php"><img src="iconimage\vehicle.png" alt="Vehicle">
            Vehicle</a></div>
        <div class="box electricalappliances">
            <a href="http://localhost/project/temp.php"><img src="iconimage\electricalAppliance.png" alt="Electrical Appliances">
            Electrical Appliances</a></div>
        <div class="box garbagecollection">
            <a href="http://localhost/project/gar2.php"><img src="iconimage\garbage.png" alt="Garbage Collection">
            Garbage Collection</a></div>
        <div class="box food">
            <a href="http://localhost/project/food2.php"><img src="iconimage\food.png" alt="Food">
            Food</a></div>
    </div>

    <script>
        let images = ["welcome.jpeg", "image1.jpeg", "image2.jpeg","image3.jpeg","image4.jpeg"];
        let index = 0;

        function changeImage() {
            index = (index + 1) % images.length;
            document.getElementById('slide').src = images[index];
        }

        setInterval(changeImage, 4000); // Change image every 4 seconds
    </script>
</body>
</html>
