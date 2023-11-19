<!DOCTYPE html>
<html lang="en">
<style>
     header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        </style>
        <header>Appointments</header>
<?php
// Database connection settings
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'appointment_booking';

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and display appointment details
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Booked Appointments</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Customer Name</th><th>Appointment Date</th><th>Appointment Time</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['appointment_date'] . "</td>";
        echo "<td>" . $row['appointment_time'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No appointments found.";
}

// Close the database connection
$conn->close();
?>
 <body >
    <br>
            <div class="button">
        <a href="appointmentonline.html"><button>HOME</button></a>  
        
    </div>
    </body>
    </html>
    
