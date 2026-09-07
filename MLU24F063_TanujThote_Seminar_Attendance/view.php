<?php
require_once 'config.php';

$sql = "SELECT id, participant_name, roll_number, seminar_title, attendance_state, registered_at FROM seminar_attendance ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registered Attendance Records</h2>
        <a href="index.php">Register New</a> | <a href="search.php">Search</a>
        <br><br>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Participant Name</th>
                <th>Roll Number</th>
                <th>Seminar Title</th>
                <th>State</th>
                <th>Date & Time</th>
            </tr>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['participant_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['roll_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['seminar_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['attendance_state']); ?></td>
                        <td><?php echo htmlspecialchars($row['registered_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No attendance records found.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>