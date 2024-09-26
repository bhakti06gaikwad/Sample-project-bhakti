
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
            <img src="logo1-Photoroom.png"  alt="Logo"></div>
            <div class="text">Cool The Globe</div>
        
        <div class="tabs">
        <a href="http://localhost/project/home.php">Home</a>
            <a href="#">My Score</a>
            <a href="http://localhost/project/gallary.php">Gallery</a>
            <a href="http://localhost/project/about.php">About</a>
        
        </div>
        <div class="dropdown">
        <button><img id = "menu" src="iconimage/menu.png"></button>
            <div class="dropdown-content">
                <a href="#">Login</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
    <div class="banner-container">
        <div class="banner-image">
            <img id="slide" src="welcome.jpeg" alt="Banner Image">
        </div>
        <div class="subtitle-container">
            <h1>
              Hey Bhakti
            </h1>
            <p>Let's start your journey to save earth...!!!</p>
        </div>
    </div>

    <div class="container">
        <div class="box vehicle">
            <a href="http://localhost/project/vehicle.php"><img src="iconimage\vehicle.png" alt="Vehicle">
            Vehicle</a></div>
        <div class="box electricalappliances">
            <a href="http://localhost/project/Appliances.php"><img src="iconimage\electricalAppliance.png" alt="Electrical Appliances">
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
