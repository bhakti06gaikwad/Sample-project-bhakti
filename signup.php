<?php
// Database connection
$host = 'localhost';
$dbname = 'user_db';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $dbname);

function test_input($data) { 
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST["age"];
    $validuser = false;

    if (empty($_POST['username'])) { 
        $unameErr = "Please enter the Username"; 
        $validuser = false;
    } else { 
        $user = test_input($_POST["username"]); 
        if (!preg_match("/^[a-zA-Z0-9 ]+$/", $user)) {
            $unameErr = "Name should contain only characters, digits, and spaces";
            $validuser = false; 
        } else {
            $validuser = true;
        }
    }

    if (empty($_POST['password'])) { 
        $passwordErr = "Please enter the password"; 
        $validuser = false;
    } else { 
        $pass = test_input($_POST['password']); 
        if (strlen($pass) < 8) {
            $passwordErr = "At least 8 characters";
            $validuser = false;
        } elseif (!preg_match("/[0-9]+/", $pass)) { 
            $passwordErr = "At least one digit"; 
            $validuser = false;
        } elseif (!preg_match("/[a-z]+/", $pass)) {
            $passwordErr = "At least one lowercase letter"; 
            $validuser = false;
        } elseif (!preg_match("/[A-Z]+/", $pass)) {
            $passwordErr = "At least one uppercase character"; 
            $validuser = false;
        } else {
            $validuser = true;
        }

        if ($age < 18) {
            $ageErr = "You must be 18 or older to register.";  
            $validuser = false;
        }
    }

    if ($validuser) {
        // Check if user already exists
        $q = "SELECT * FROM instausers WHERE username = ?";
        $stmt = $conn->prepare($q);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if (mysqli_num_rows($result) > 0) {
            echo "User already exists. <a href='login.php'>Log in here</a>";
        } else {
            // Use prepared statements to insert data safely
            $q = "INSERT INTO instausers (username, password, age) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($q);
            $stmt->bind_param("ssi", $user, $pass, $age); // "s" for string, "i" for integer
            $r = $stmt->execute();

            if ($r) {
                echo "Registration successful. <a href='login.php'>Log in here</a>";
            } else {
                echo "Registration unsuccessful...";
            }
        }
        $stmt->close();
    }
}

mysqli_close($conn);
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="design.css">
 </head>
 <body>
     <div class="form-container">
         <h2>Sign Up</h2>
         <form method="POST" action="">
           <input type="text" name="username" placeholder="Username" required>
           <span class="error">* <?php if(isset($unameErr )) echo $unameErr;?></span> 
             <input type="password" name="password" placeholder="Password" required>
             <span class="error">* <?php if(isset($passwordErr ))echo 
$passwordErr;?></span>
             <input type="number" name="age" placeholder="Age" required>
             <span class="error">* <?php if(isset($ageErr ))echo 
$ageErr;?></span>
            <button type="submit">Sign Up</button>
        </form>
        <a href="login.php">Already have an account? Log in here</a>
   </div>
 </body>
 </html>