<?php
require_once 'config.php';

$search_term = "";
$results = [];

if (isset($_GET['search'])) {
    $search_term = trim($_GET['search']);
    $param = "%" . $search_term . "%";

    $sql = "SELECT * FROM seminar_attendance WHERE seminar_title LIKE ? OR participant_name LIKE ? OR attendance_state LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $param, $param, $param);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($res)) {
        $results[] = $row;
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Search & Filter Attendance</h2>
        <a href="index.php">Register New</a> | <a href="view.php">View All</a>
        <br><br>
        <form method="GET" action="search.php">
            <input type="text" name="search" placeholder="Search title or name..." value="<?php echo htmlspecialchars($search_term); ?>" required>
            <button type="submit">Search</button>
        </form>
        <br>
        <?php if (isset($_GET['search'])): ?>
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Participant Name</th>
                    <th>Roll Number</th>
                    <th>Seminar Title</th>
                    <th>State</th>
                </tr>
                <?php if (count($results) > 0): ?>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['participant_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['roll_number']); ?></td>
                            <td><?php echo htmlspecialchars($row['seminar_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['attendance_state']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">No matching records found.</td></tr>
                <?php endif; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>