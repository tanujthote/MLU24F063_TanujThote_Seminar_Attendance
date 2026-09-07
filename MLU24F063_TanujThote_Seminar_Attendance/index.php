<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seminar Attendance Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Seminar Attendance Registration</h2>
        <nav>
            <a href="index.php">Register Attendance</a> | 
            <a href="view.php">View Attendance List</a> | 
            <a href="search.php">Search Records</a>
        </nav>
        <hr>
        <form action="save.php" method="POST">
            <label>Participant Full Name:</label><br>
            <input type="text" name="participant_name" required><br><br>

            <label>Roll Number:</label><br>
            <input type="text" name="roll_number" required><br><br>

            <label>Seminar Title:</label><br>
            <input type="text" name="seminar_title" required><br><br>

            <label>Attendance State:</label><br>
            <select name="attendance_state" required>
                <option value="">--Select State--</option>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Late">Late</option>
            </select><br><br>

            <button type="submit">Submit Attendance</button>
        </form>
    </div>
</body>
</html>