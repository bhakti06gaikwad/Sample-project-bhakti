<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="pract.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Protest+Guerrilla&display=swap" rel="stylesheet">

    <style>
        body {
            /* font-family: Arial, sans-serif; */
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        
        
        .team-section {
            text-align: center;
            padding: 50px 0;
        }
        .team-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }
        .team-container {
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .team-member {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 200px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }
        .team-member:hover {
            transform: translateY(-10px);
        }
        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .team-member h2 {
            font-size: 22px;
            margin: 10px 0;
            color: #333;
        }
        .team-member p.title {
            font-size: 16px;
            color: #999;
            margin-bottom: 10px;
        }
        .social-links {
            display: flex;
            justify-content: center;
            gap:0px;
        }

        .social-links img{
                width:45px;
                height:45px;
        }
        .social-links a {
            color: #333;
            font-size: 18px;
            text-decoration: none;
        }
        .social-links a:hover {
            color: #007bff;
        }
    </style>
</shead>
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

<div class="team-section">
    <h1>Our Perfect Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="iconimage/sweety1.jpg" alt="Vaishnavi Sabale">
            <h2>Vaishnavi Sabale</h2>
            <p class="title">Designer</p>
            
            <div class="social-links">
                <a href="https://wa.me/7066356842"><img src="iconimage/whatsapp.png" alt="WhatsApp"></a>
                <a href="#"><img src="iconimage/linked_in.png" alt="Linked in"></a>
                <a href="https://www.instagram.com/_sweenavi_"><img src="iconimage/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="iconimage/twitter.png" alt="Facebook"></a>
            </div>
        </div>
        <div class="team-member">
            <img src="iconimage/radhika.jpg" alt="Radha Kshirsagar">
            <h2>Radha Kshirsagar</h2>
            <p class="title">Manager</p>
            <div class="social-links">
                <a href="https://wa.me/9370734531"><img src="iconimage/whatsapp.png" alt="WhatsApp"></a>
                <a href="#"><img src="iconimage/twitter.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/radhaa.k10"><img src="iconimage/instagram.png" alt="WhatsApp"></a>
                <a href="https://www.linkedin.com/in/radhika-kshirsagar-b14343299"><img src="iconimage/linked_in.png" alt="WhatsApp"></a>
            </div>
        </div>
        <div class="team-member">
            <img src="iconimage/Bhakti.jpg" alt="Bhakti Gaikwad">
            <h2>Bhakti Gaikwad</h2>
            <p class="title">Programming Guru</p>
            <div class="social-links">
                <a href="https://wa.me/7709709780"><img src="iconimage/whatsapp.png" alt="WhatsApp"></a>
                <a href="https://www.linkedin.com/in/bhakti-gaikwad-0898112b7"><img src="iconimage/linked_in.png" alt="Linked in"></a>
                <a href="#"><img src="iconimage/telegram.png" alt="Facebook"></a>
            </div>
        </div>
        <div class="team-member">
            <img src="iconimage/rajeshree.jpg" alt="Rajashri Lakde">
            <h2>Rajashri Lakde</h2>
            <p class="title">Sales Manager</p>
            <div class="social-links">
                <a href="https://wa.me/8698335794"><img src="iconimage/whatsapp.png" alt="WhatsApp"></a>
                <a href="https://www.instagram.com/rajshri__006"><img src="iconimage/instagram.png" alt="Instagram"></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
