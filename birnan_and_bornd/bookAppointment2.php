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

<header>
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

// Get data from the HTML form
$customerName = $_POST['customerName'];
$appointmentDate = $_POST['appointmentDate'];
$appointmentTime = $_POST['appointmentTime'];

// Check if the selected time is available
if (isTimeSlotAvailable($conn, $appointmentDate, $appointmentTime)) {
    // Book the appointment
    $sql = "INSERT INTO appointments (customer_name, appointment_date, appointment_time) VALUES ('$customerName', '$appointmentDate', '$appointmentTime')";

    if ($conn->query($sql) === TRUE) {
        // Appointment booked successfully
        echo json_encode('Appointment booked successfully.');
    } else {
        // Error in booking appointment
        echo json_encode( 'Error in booking appointment.');
    }
} else {
    // Time slot is not available
    echo json_encode('This time slot is already booked. Please choose another time.');
}

// Close the database connection
$conn->close();

function isTimeSlotAvailable($conn, $selectedDate, $selectedTime) {
    // Check if the selected time slot is available
    $sql = "SELECT * FROM appointments WHERE appointment_date = '$selectedDate' AND appointment_time = '$selectedTime'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Time slot is not available
        return false;
    } else {
        // Time slot is available
        return true;
    }
}
?>
</header>
<br>

    
        <body >
            <div class="button">
        <a href="appointmentonline.html"><button>HOME</button></a>  
        <a href="book_appointment.html"><button>New Appointment</button></a>
    </div>
    </body>
    </html>
    