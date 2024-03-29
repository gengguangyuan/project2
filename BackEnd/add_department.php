<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Form</title>
</head>
<body>
    <h2>Department Form</h2>
    <form id="DepartmentForm" method="post" action="process_department.php">
        <label for="deptName"> Department Name:</label><br>
        <input type="text" name="deptName"><br>
        <label for="managerssn"> Manager SSN:</label><br>
        <select name="managerssn"><br>
        
        <?php
        // Include the database connection
        include 'db_connection.php';

        // Retrieve existing employees to populate the dropdown
        $employees_query = "SELECT Fname, Minit, Lname, Ssn FROM employee";
        $result = $conn->query($employees_query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["Ssn"] . "'>" . $row["Fname"] . " " . $row["Minit"] . ". " . $row["Lname"] . "</option>";
            }
        }
        ?>
        </select><br>
        <label for="startDate"> Start Date:</label><br>
        <input type="date" name="startDate"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>