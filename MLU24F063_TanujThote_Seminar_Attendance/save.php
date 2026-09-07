<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $participant_name = mysqli_real_escape_string($conn, $_POST['participant_name']);
    $roll_number      = mysqli_real_escape_string($conn, $_POST['roll_number']);
    $seminar_title    = mysqli_real_escape_string($conn, $_POST['seminar_title']);
    $attendance_state = mysqli_real_escape_string($conn, $_POST['attendance_state']);

    $sql = "INSERT INTO seminar_attendance (participant_name, roll_number, seminar_title, attendance_state) 
            VALUES ('$participant_name', '$roll_number', '$seminar_title', '$attendance_state')";

    if (mysqli_query($conn, $sql)) {
        echo "Attendance registered successfully! <a href='view.php'>View Records</a>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
?>