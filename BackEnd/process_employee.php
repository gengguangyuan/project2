<?php
include 'db_connection.php';
$first_name = $_POST['first_name'];
$Minit = $_POST['Minit'];
$lastname = $_POST['lastname'];
$ssn = $_POST['ssn'];
$datebirth = $_POST['datebirth'];
$address = $_POST['address'];
$sex = $_POST['sex'];
$salary = $_POST['salary'];
$superssn = $_POST['superssn'];
$departmentnumber = $_POST['departmentNumber'];

// Check if the supervisor's SSN exists in the database
$check_manager_query = "SELECT * FROM employee WHERE ssn = '$superssn'";
$result = $conn -> query($check_manager_query);

if ($result -> num_rows == 0) {
	// Display error if manager SSN does not exist
	echo "Error: Manager's SSN does not exist in the database.";
} else {
    // Check if the SSN already exists in the database
    $check_ssn_query = "SELECT * FROM employee WHERE ssn = '$ssn'";
    if ($result -> num_rows > 0) {
    	echo "Error: Employee's SSN already existed in the database.";
		} else {
            $insert_query = "insert into employee (`Fname`, `Minit`, `Lname`, `Ssn`, `Bdate`, `Address`, `Sex`, `Salary`, `Super_ssn`, `Dno`) 
            values ( '$first_name', '$Minit', '$lastname', '$ssn', '$datebirth', '$address', '$sex', '$salary', '$superssn', '$departmentnumber')";
            
            echo $insert_query;
            
            if ($conn->query($insert_query) === TRUE) {
                echo "New record created succesfully!";
            } else {
                echo "Error: " .$insert_query . "<br>" . $conn->error;
            }
      
    }
}

?>