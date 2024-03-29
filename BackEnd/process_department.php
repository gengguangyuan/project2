<?php
include 'db_connection.php';
$dept_location = 'Columbus';

// Check if 'Columbus' exists in the table
$check_location_query = "SELECT Dnumber FROM dept_locations WHERE Dlocation = '$dept_location'";
$location_result = $conn->query($check_location_query);

if ($location_result->num_rows > 0) {
    // 'Columbus' exists, retrieve the department number (DNO)
    $row = $location_result->fetch_assoc();
    $dno = $row['Dnumber'];
    // Retreive value from form
    $dept_name = $_POST['deptName'];
    $manager_ssn = $_POST['managerssn'];
    $start_date = $_POST['startDate'];
    
    // Build SQL query for insertion
    $insert_department_query = "INSERT INTO department (Dname, Dnumber, Mgr_ssn, Mgr_start_date) VALUES ('$dept_name', '$dno', '$manager_ssn', '$start_date')";
    // Insert
    if ($conn->query($insert_department_query) === TRUE) {
    	echo "New department created successfully";
    } else {
        echo "Error: " . $insert_department_query . "<br>" . $conn->error;
    }
} else {
  	// Columbus does not exist
  	echo 'Error: ' . $dept_location . " does not exist in database";
    exit();
}

?>