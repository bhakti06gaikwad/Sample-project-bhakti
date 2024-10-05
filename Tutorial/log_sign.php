<?php
session_start();
if (isset($_POST['signup'])|| isset($_POST['login'])) {
    $email = $_SESSION['email'] = $_POST['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login: Earth Being</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
// Database credentials
$host = "localhost";
$user = "root";
$pwd = "";
$db = "globe_login";

// Establishing the connection
$c = mysqli_connect($host, $user, $pwd, $db);
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define variables and set to empty values
$userErr = $emailErr = $ageErr = $loginErr = $idErr = "";
$uname = $email = $age = $contribute = "";
$successMessage = "";

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Signup logic
        $uname = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $age = test_input($_POST["age"]);
        $contribute = test_input($_POST["contribute"]);

        // Username validation: must start with a letter and contain only letters, numbers, or underscores
        if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_\-\.]*$/", $uname)) {
            $userErr = "Username must start with a letter and contain only letters, numbers, underscores, or periods.";
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

        // Age validation
        if (!is_numeric($age)) {
            $ageErr = "Age must be a number";
        }

        // If no errors, insert data into the database
        if (empty($userErr) && empty($emailErr) && empty($ageErr)) {
            $uname = mysqli_real_escape_string($c, $uname);
            $email = mysqli_real_escape_string($c, $email);
            $age = mysqli_real_escape_string($c, $age);
            $contribute = mysqli_real_escape_string($c, $contribute);

            // Check if the username or email already exists
            $checkUserQuery = "SELECT * FROM login_info WHERE email='$email' ;#OR user='$uname'";
            $result = mysqli_query($c, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
                echo "User or email already exists. Please log in.";
            } else {
                $validLogin = true;
                $_SESSION['email'] = $email;
                $q = "INSERT INTO login_info (user, email, age, contribute) VALUES ('$uname', '$email', '$age', '$contribute')";
                if (mysqli_query($c, $q)) {
                    // Fetch the ID assigned to the new user
                    $assignedId = mysqli_insert_id($c);

                    // Send confirmation email with username and email
                    sendEmail($email, "Signup Confirmation", "Welcome $uname! You have successfully signed up with the email $email. Your user ID is: $assignedId.");
                    $successMessage = "You have successfully signed up. Please log in.";
                   
                } else {
                    echo "Error: " . mysqli_error($c);
                }
                if ($validLogin) {
                    header("Location: http://localhost/Tutorial/home.php");
                    
                } else {
                    echo "Invalid login!";
            }
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        $email = test_input($_POST["email"]);
        $uname = test_input($_POST["id"]);

        // Check if user exists in the database with both email and username
        $checkUserQuery = "SELECT * FROM login_info WHERE email='$email'AND id='$uname';# AND user='$uname'";
        $result = mysqli_query($c, $checkUserQuery);

        if (mysqli_num_rows($result) > 0) {
            $validLogin = true;
            $_SESSION['email'] = $email;
            $successMessage = " <a href='logout.php'>Logout</a>";
            sendEmail($email, "Login Confirmation", "Hello! You have successfully logged in. $successMessage");
            if ($validLogin) {
                header("Location: http://localhost/Tutorial/home.php");
                
            } else {
                echo "Invalid login!";
        }
        } else {
            echo "<script type='text/javascript'> alert('Invalid email or username.');</script>";
        }
        
    
   
    }
}

// Function to sanitize input
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to send email (use PHPMailer here)
function sendEmail($to, $subject, $message) {
    // PHPMailer email sending logic here
    require 'C:\xampp\htdocs\Tutorial\Exception.php';
require 'C:\xampp\htdocs\Tutorial\PHPMailer.php'; 
require 'C:\xampp\htdocs\Tutorial\SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vsabale15847@gmail.com'; // Your email
        $mail->Password = 'rdnk rfet eory znnp';     // Your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('vsabale15847@gmail.com', 'Cool The Globe Community');
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "<script type='text/javascript'> alert ('Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}

mysqli_close($c);
?>
 <style>
       body {
    margin: 0;
    padding: 0;
    display: flex;
    background-image: url('earth2.jpg');
    background-blend-mode: color-dodge;
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: "Arial", sans-serif;
}

.main {
    width: 420px;
    height: 450px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 5px 20px 50px #000;
}

#chk {
    display: none;
}

.signup, .login {
    position: absolute;
    width: 100%;
    height: 100%;
    transition: transform 0.6s ease;
}

.signup {
    transform: translateX(0%);
}

.login {
    transform: translateX(100%);
}

input {
    width: 80%;
    height: 30px;
    background: #e0dede;
    margin: 20px auto;
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 5px;
    display: block;
}

.sub-but {
    width: 80%;
    height: 40px;
    margin: 10px auto;
    color: #fff;
    background: #573b8a;
    font-size: 1em;
    font-weight: bold;
    outline: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.select {
    width: 80%;
    margin: 0 auto 20px;
    position: relative;
}

.select label {
    color: #573b8a;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
    text-align: left;
}

.select select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #573b8a;
    border-radius: 5px;
    outline: none;
    background-color: #e0dede;
    color: #573b8a;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Arrow for select box */
.select select::-ms-expand {
    display: none;
}

.select::after {
    content: '\25BC'; /* Down arrow */
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    color: #573b8a;
    pointer-events: none;
}

.select select:hover {
    background-color: #f0f0f0;
}

.select select:focus {
    border-color: #8e44ad;
    background-color: #fafafa;
}

/* Placeholder style for the first option */
.select select option:first-child {
    color: gray;
    font-style: italic;
}

h2 {
    text-align: center;
    color: blueviolet;
    margin-bottom: 20px;
}

p {
    text-align: center;
    font-size: 14px;
}

a {
    color: blueviolet;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;
}
    </style>
<div class="main">
    <!-- Signup form -->
    <div class="signup">
        <form method="post">
            <h2>Sign Up: Earth Being</h2>
            <input type="text" name="username" placeholder="User Name" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="age" placeholder="Age" required>
    
            <div class="select">
                <label for="why">Why are You Contributing..?</label>
                <select name="contribute" required>
                    <option value="">Select reason</option>
                    <option >I recognize my role in contributing to global warming through my energy consumption.</option>
                    <option >I acknowledge the impact of my lifestyle choices on climate change.</option>
                    <option >I am committed to reducing my carbon footprint.</option>
                </select>
            </div>
            <input type="submit"  name="signup" id="alert_sign" value="Sign Up" class="sub-but">
            <p>Already have an account? <a href="#" id="login-link">Log In</a></p>
        </form>
        <p><?php echo $userErr . " " . $emailErr . " " . $ageErr . " " . $successMessage; ?></p>
    </div>
    
    <!-- Login form -->
    <div class="login">
        <form method="post" >
            <h2>Log In: Earth Being</h2>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="id" placeholder="ID" required>
            <input type="submit" name="login" id="alert_login" value="Log In" class="sub-but">
            
            <p>Don't have an account? <a href="#" id="signup-link">Sign Up</a></p>

            
        </form>
        <p><?php echo $loginErr . " " . $idErr . " " . $successMessage; ?></p>
    </div>
</div>

<!-- JavaScript for toggling between Sign Up and Log In forms -->
<script>
    document.getElemen
    document.getElementById('login-link').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.signup').style.transform = 'translateX(-100%)';
        document.querySelector('.login').style.transform = 'translateX(0%)';
    });

    document.getElementById('signup-link').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.signup').style.transform = 'translateX(0%)';
        document.querySelector('.login').style.transform = 'translateX(100%)';
    });
    //window.location.href = 'sign.php';
    /* When the login button is clicked, prevent the form from auto-submitting
document.getElementById('alert_login').addEventListener('click', function(event) {
    event.preventDefault();
    
    // Get the login success status and message from the hidden fields
    var loginSuccess = document.getElementById('login_success').value;
    var loginMessage = document.getElementById('login_message').value;

    // Use if..else to show appropriate alert based on login status
    if (loginSuccess === '1') {
        alert(loginSuccess); // Show success message
        // Optionally, you can redirect the user to another page after successful login
        
    } else {
        alert(loginMessage); // Show error message
    }
});*/


    

</script>

</body>
</html>