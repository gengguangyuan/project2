<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information Form</title>
</head>
<body>
    <?php include 'db_connection.php'; ?>
    <h2>Employee Information Form</h2>
    <form id="employeeForm" method="post" action="process_employee.php">
        <label for="firstName"> First Name:</label><br>
      <input type="text" id="first_name" name="first_name"><br>
      <label for="Minit"> Middle Name:</label><br>
      <input type="text" name="Minit"><br>
      <label for="lastname"> Last Name:</label><br>
      <input type="text" name="lastname"><br>
      <label for="ssn"> SSN:</label><br>
      <input type="text" name="ssn"><br>
      <label for="datebirth"> Data Birth:</label><br>
      <input type="date" name="datebirth"><br>
      <label for="address"> Address:</label><br>
      <textarea name="address"></textarea><br>
      <label for="sex"> Sex:</label><br>
      <select id="sex" name="sex" required>
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select><br>
      <label for="salary"> Salary:</label><br>
      <input tpye="number" name="salary"><br>
      <label for="superssn"> Spuer SSN:</label><br>
      <input type="text" name="superssn"><br>
      
      
      <label for="departmentNumber"> Department Number:</label><br>
    <select name="departmentNumber" id="departmentNumber">
        <?php

        // Retrieve existing department numbers from the database
        $sql = "SELECT DISTINCT Dnumber FROM department";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["Dnumber"] . "'>" . $row["Dnumber"] . "</option>";
            }
        }
        ?>
        </select><br>
      <button type="submit">Submit</button>
      </form>
</body>
</html>