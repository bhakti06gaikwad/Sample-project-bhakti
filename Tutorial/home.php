<?php
session_start();
$host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "globe_login";
    
    // Establishing the connection
    $c = mysqli_connect($host, $user, $pwd, $db);
    if (!$c) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_SESSION['email'];  // Assuming the email is stored in session when user logs in

// Prepare the SQL statement
$checkQuery = "SELECT user FROM login_info WHERE email = ? ";
$stmt = mysqli_prepare($c, $checkQuery);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);

// Fetch the result
mysqli_stmt_bind_result($stmt, $username);
mysqli_stmt_fetch($stmt);

mysqli_stmt_close($stmt);
mysqli_close($c);
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
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .banner-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        position: relative;
        height: 100vh; /* Make container take up full height of the viewport */
        padding:20px;
        
    }

    .banner-image img {
        width: 100%; /* Ensure the image takes full width */
        height: 80%; /* Full height of the viewport */
        object-fit: cover; /* Maintain aspect ratio while covering the container */
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1; /* Ensure image stays behind the text */
        padding:20px;
        margin-bottom:20px;
    }
    
    
</style>

<body>
<div class="navbar">
        <div class="logo">
            <img src="logo1-Photoroom.png"  alt="Logo"></div>
            <div class="text">Cool The Globe</div>
        
        <div class="tabs">
        <a href="http://localhost/Tutorial/home.php">Home</a>
            <a href="http://localhost/Tutorial/temp_my_score.php">My Score</a>
            <a href="http://localhost/Tutorial/gallary.php">Gallery</a>
            <a href="http://localhost/Tutorial/about.php">About</a>
        
        </div>
        <div class="dropdown">
        <button><img id = "menu" src="iconimage/menu.png"></button>
            <div class="dropdown-content">
                <a href="http://localhost/Tutorial/log_sign.php">Login</a>
                <a href="http://localhost/Tutorial/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="banner-container">
        <div class="banner-image">
            <img id="slide" src="welcome.jpeg" alt="Banner Image">
        </div>
        <div class="subtitle-container">
            <h1>
              Hey  <?php echo htmlspecialchars($username); ?> 
            </h1>
            <p>Let's start your journey to save earth...!!!</p>
        </div>
    </div>

    <div class="container">
        <div class="box vehicle">
            <a href="http://localhost/Tutorial/temp_veh.php"><img src="iconimage\vehicle.png" alt="Vehicle">
            Vehicle</a></div>
        <div class="box electricalappliances">
            <a href="http://localhost/Tutorial/temp_app.php"><img src="iconimage\electricalAppliance.png" alt="Electrical Appliances">
            Electrical Appliances</a></div>
        <div class="box garbagecollection">
            <a href="http://localhost/Tutorial/temp_gar2.php"><img src="iconimage\garbage.png" alt="Garbage Collection">
            Garbage Collection</a></div>
        <div class="box food">
            <a href="http://localhost/Tutorial/food.php"><img src="iconimage\food.png" alt="Food">
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
