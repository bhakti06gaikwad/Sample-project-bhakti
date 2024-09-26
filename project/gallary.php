<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Protest+Guerrilla&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .navbar {
    display: flex;
justify-content: space-between;
align-items: center;
background-color: #333;
padding: 10px 20px;
color: #fff;
max-height: 70px;


}


.navbar .logo {
    display: flex;
    align-items: center;
}
.navbar .logo img {

width: 120px; /* Set the logo width */
height: 120px; /* Set the logo height */
margin-right: -18px;
filter: invert(1);
}
.navbar .text {
    font-size: 30px;
    
        font-family: "Protest Guerrilla", sans-serif;
        font-weight: 400;
        font-style: normal;
      
    
    
}
.navbar .tabs {
    display: flex;
    justify-content: center;
    flex-grow: 1;


    font-family: "Nerko One", cursive;
        font-weight: 400;
        font-style: normal;
      
}
.navbar .tabs a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    font-size: 25px;
}
.navbar .tabs a:hover {
    background-color: #575757;
    border-radius: 5px;
}

#menu{
    height: 35px;
    width: 35px;
    
    filter: invert(1);
}

.navbar .dropdown {
    position: relative;
    display: inline-block;
}
.navbar .dropdown button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    cursor: pointer;
}
.navbar .dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.navbar .dropdown-content a {

    font-family: "Nerko One", cursive;
    font-weight: 400;
    font-style: normal;
    font-size: 25px;

    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.navbar .dropdown-content a:hover {
    background-color: #ddd;
}
.navbar .dropdown:hover .dropdown-content {
    display: block;
}
.navbar .dropdown:hover button {
    background-color: #575757;
}

@media screen and (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }
    .navbar .tabs {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }
    .navbar .tabs a {
        padding: 10px;
        width: 100%;
        text-align: left;
    }
    .navbar .dropdown {
        width: 100%;
    }
    .navbar .dropdown button {
        width: 100%;
        text-align: left;
    }
    .navbar .dropdown-content {
        min-width: 100%;
    }
}
        .achievements {
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .achievements h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .upload-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .upload-section input[type="file"] {
            display: none;
        }
        .upload-section label {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            display: inline-block;
        }
        .upload-section label:hover {
            background-color: #45a049;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px; /* Add some gap between images */
        }
         .gallery-item {
            display: flex;
            padding-top: 100px;
            object-fit: cover;
            flex-direction: column;
            width:30%; /* Adjust width to fit two items in a row */
            box-sizing: border-box;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        } 
         .gallery-item img{
            width: 100%;
            height: 200px;
            display: block;
            border-bottom: 1px solid #ccc;
        }
        .description {
            padding: 10px;
            background-color: #f3f3f3;
        }
        .description textarea {
            width: 100%;
            height: 100px;
            border: none;
            padding: 10px;
            font-size: 16px;
            resize: none;
            box-sizing: border-box;
            outline: none;
        }
        @media screen and (max-width: 768px) {
            .gallery-item {
                width: 100%;/* Adjust for smaller screens */
            }
        }
         .description {
            padding: 10px;
            background-color: #f3f3f3;
        }
        .description p {
            margin: 0;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        .modal-content img {
            width: 100%;
            height: auto;
        }
        .modal .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }  
    </style>
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

    <div class="achievements">
            <h1>Achievements</h1>
    

        <div class="upload-section">
            <form id="upload-form" action="" method="POST" enctype="multipart/form-data">
                <label for="upload-input">Upload Your Achievement Photo</label>
                <input type="file" id="upload-input" name="image" accept="image/*" required>
                <textarea name="comment" placeholder="Add a comment..." required></textarea>
                <button type="submit">Upload</button>
            </form>
        </div>

        <!-- Modal for image zoom -->
        <div id="imageModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-content">
                <img id="modalImage" src="" alt="Zoomed Image">
            </div>
        </div>

        <div class="gallery" id="gallery">
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "globe_login";

              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

            //   $query = "CREATE TABLE achievements(
            //     id int AUTO_INCREMENT PRIMARY KEY,
            //     image_path VARCHAR(255) NOT NULL,
            //     comment TEXT,
            //     uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
                
            //     $result=mysqli_query($conn,$query);
                
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $comment = $conn->real_escape_string(trim($_POST['comment']));
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = "uploads/";
                    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                    $target_file = $target_dir . uniqid() . '.' . $imageFileType;

                    $allowed_file_types = ['jpg', 'jpeg', 'png', 'gif'];
                    $check = getimagesize($_FILES['image']['tmp_name']);
                    
                    if ($check !== false && in_array($imageFileType, $allowed_file_types)) {
                        if ($_FILES['image']['size'] < 2 * 1024 * 1024) {
                            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                                $sql = "INSERT INTO achievements (image_path, comment) VALUES ('$target_file', '$comment')";
                                if ($conn->query($sql) === FALSE) {
                                    
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            echo "Sorry, your file is too large. Maximum size is 2MB.";
                        }
                    } else {
                        echo "File is not an image or file type is not allowed.";
                    }
                }
              }

              // Fetch and display achievements from the database
              $result = $conn->query("SELECT * FROM achievements ORDER BY uploaded_at DESC");
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="gallery-item">';
                  echo '<img src="'.$row['image_path'].'" alt="Achievement Photo" onclick="openModal(\''.$row['image_path'].'\')">';
                  echo '<div class="description">';
                  echo '<p>' . htmlspecialchars($row['comment']) . '</p>';
                  echo '</div>';
                  echo '</div>';
              }
              $conn->close();
            ?>
        </div>
    </div>

    <script>
        // Open the modal and display the clicked image
        function openModal(src) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("modalImage");
            modal.style.display = "block";
            modalImg.src = src;
        }

        // Close the modal
        function closeModal() {
            var modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }

        // Close the modal when clicking outside the image
        window.onclick = function(event) {
            var modal = document.getElementById("imageModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
