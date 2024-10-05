<?php
session_start();

// Check if the category is provided in the URL
if (!isset($_GET['category'])) {
    die("No category selected.");
}

$category = $_GET['category'];  // Get the category from the query string
$uname = $_SESSION['email'];  // Assuming the session is still active and user is logged in

$host = "localhost";
$user = "root";
$pwd = "";
$db = "globe_login";

// Establish the connection
$c = mysqli_connect($host, $user, $pwd, $db);
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

$pastData = [];  // To store past 6 days' data for the selected category

// Determine the correct column and table to query based on the selected category
$column = '';
$table = '';

switch ($category) {
    case 'Vehicle':
        $column = 'vehicle_meta_count';
        $table = 'vehicle';
        break;
    case 'Food':
        $column = 'food_meta_count';
        $table = 'food';
        break;
    case 'Appliances':
        $column = 'appliances_meta_count';
        $table = 'appliances';
        break;
    case 'Garbage':
        $column = 'garbage_meta_count';
        $table = 'garbage';
        break;
    default:
        die("Invalid category selected.");
}

// Query past 6 days' metacounts for the selected category
for ($i = 6; $i >= 1; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));  // Calculate past date

    // Prepare and execute the SQL statement
    $stmt = $c->prepare("SELECT $column FROM $table WHERE Datea = ? AND User_Id = ?");
    $stmt->bind_param("ss", $date, $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $pastData[] = $row[$column];  // Store the metacount for the day
    } else {
        $pastData[] = 0;  // If no data, store 0
    }
    $stmt->close();
}

// Close the database connection
mysqli_close($c);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past 6 Days Data for <?php echo $category; ?></title>
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

<h1>Past 6 Days Data for <?php echo $category; ?></h1>

<div class="chart-container">
    <canvas id="barChart"></canvas>
</div>

<script>
    // PHP data in JavaScript
    var pastData = <?php echo json_encode($pastData); ?>;

    var barCtx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Day 6', 'Day 5', 'Day 4', 'Day 3', 'Day 2', 'Day 1'],
            datasets: [{
                label: '<?php echo $category; ?> Metacount',
                backgroundColor: '#FF6384',
                data: pastData  // PHP injects the past data here
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

</body>
</html>
