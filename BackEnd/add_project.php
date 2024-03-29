<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
</head>
<body>
    <h2>Project Form</h2>
    <form id="DepartmentForm" method="post" action="process_project.php">
    <label for="employee_ssn"> Manager SSN:</label><br>
        <select name="employee_ssn" id="employee_ssn"><br>
        
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
        <label for="project"> Project Name:</label><br>
        <select name="project" id="project"><br>
    </select><br>
        <button type="submit">Submit</button>
    </form>
    <script>  
    $('#employee_ssn').on('change', function() {
        var employee_ssn = $(this).val();
        $.ajax({
            url: 'get_project.php',
            type: 'POST',
            data: {employee_ssn: employee_ssn},
            success: function(response) { 
                console.log(response);
                $('#project').html(response);
            }
        });
    });
</script>
</body>
</html>