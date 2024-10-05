<?php
session_start();

// Check if the form was submitted either via signup or login
if (isset($_POST['signup']) || isset($_POST['login'])) {
    // Store the username in a session variable
    $_SESSION['email'] = $_POST['email'];
}
$host = "localhost";
$user = "root";
$pwd = "";
$db = "globe_login";

// Establish the connection
$c = mysqli_connect($host, $user, $pwd, $db);
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Default values
$vehicle_meta_count = 0;
$garbage_meta_count = 0;
$food_meta_count = 0;
$appliances_meta_count = 0;

$grand_total = 0; // Initialize grand total


    $uname = $_SESSION['email']; // Get user email
    
    
    
    // Get today's date
    $currentDate = date('Y-m-d');
    
    // Prepared statements for fetching today's counts
    $v = "SELECT vehicle_meta_count FROM vehicle WHERE Datea = ? AND user = ?";
    $g = "SELECT garbage_meta_count FROM garbage WHERE User_Id = ? AND Datea = ?";
    $f = "SELECT food_meta_count FROM food WHERE User_Id = ? AND Datea = ?";
    $a = "SELECT appliances_meta_count FROM appliances WHERE User_Id = ? AND Datea = ?";
    
    // Execute the first statement (for vehicle)
    $stmt1 = $c->prepare($v);
    $stmt1->bind_param("ss", $currentDate, $uname);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    if ($row1 = $result1->fetch_assoc()) {
        $vehicle_meta_count = $row1['vehicle_meta_count'];
    }
    $stmt1->close();
    
    // Execute the second statement (for garbage)
    $stmt2 = $c->prepare($g);
    $stmt2->bind_param("ss", $uname, $currentDate);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    if ($row2 = $result2->fetch_assoc()) {
        $garbage_meta_count = $row2['garbage_meta_count'];
    }
    $stmt2->close();

    // Execute the third statement (for food)
    $stmt3 = $c->prepare($f);
    $stmt3->bind_param("ss", $uname, $currentDate);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    if ($row3 = $result3->fetch_assoc()) {
        $food_meta_count = $row3['food_meta_count'];
    }
    $stmt3->close();
    
    // Execute the fourth statement (for appliances)
    $stmt4 = $c->prepare($a);
    $stmt4->bind_param("ss", $uname, $currentDate);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    if ($row4 = $result4->fetch_assoc()) {
        $appliances_meta_count = $row4['appliances_meta_count'];
    }
    $stmt4->close();

    // Calculate the grand total
    $grand_total = $vehicle_meta_count + $garbage_meta_count + $food_meta_count + $appliances_meta_count;

    // Insert the grand total into the database
    $insert_stmt = $c->prepare("INSERT INTO grand_totals (User_Id, date, total_count) VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE total_count = ?");
    $insert_stmt->bind_param("ssdd", $uname, $currentDate, $grand_total, $grand_total);
    $insert_stmt->execute();
    $insert_stmt->close();

    // Optionally unset the session variable



// Close the database connection
mysqli_close($c);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My GHG Savings</title>
    <link rel="stylesheet" href="pract.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Protest+Guerrilla&display=swap" rel="stylesheet">

</head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie and Bar Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        canvas {
            width: 300px !important;
            height: 300px !important;
        }

    </style>
</head>
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

<div class="chart-container">
    <canvas id="pieChart"></canvas>
   
</div>


<script>// PHP data in JavaScript
var vehicleMetaCount = <?php echo $vehicle_meta_count; ?>;
var garbageMetaCount = <?php echo $garbage_meta_count; ?>;
var foodMetaCount = <?php echo $food_meta_count; ?>;
var appMetaCount = <?php echo $appliances_meta_count; ?>;

// Create Pie Chart with today's grand total
var data = {
    labels: ['Vehicle', 'Food', 'Appliances', 'Garbage'],
    datasets: [{
        label: 'Metacount',
        data: [vehicleMetaCount, foodMetaCount, appMetaCount, garbageMetaCount],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
    }]
};

// Calculate grand total
var grandTotal = data.datasets[0].data.reduce((a, b) => a + b, 0);

// Display the pie chart with the grand total
var pieCtx = document.getElementById('pieChart').getContext('2d');
var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += context.raw;
                        return label;
                    }
                }
            },
            centerText: {
                text: 'Total: ' + grandTotal  // Display the total in the center
            }
        },
        onClick: function(evt, activeElements) {
            if (activeElements.length > 0) {
                var index = activeElements[0].index;
                var category = data.labels[index];  // Get the category that was clicked
                // Redirect to a new page with the category as a query parameter
                window.location.href = 'past_data.php?category=' + category;
            }
        }
    }
});
</script>