<?php
include 'db_connection.php';
// Retrieve the selected employee's SSN from the AJAX request
$employee_ssn = $_POST['employee_ssn'];

// Query to retrieve the department number (Dno) of the selected employee
$department_query = "SELECT Dno FROM employee WHERE Ssn = '$employee_ssn'";
$department_result = $conn->query($department_query);

if ($department_result->num_rows > 0) {
	$row_department = $department_result->fetch_assoc();
  $deparment_number = $row_department['Dno'];
  
  // Query the projects under the department
  $project_query = "SELECT Pname FROM project WHERE Dnum = '$department_number'";
  $result_projects = $conn->query($project_query);
  
  if ($result_projects->num_rows > 0) {
      $options = '';
    	while ($row_project = $result_projects->fetch_assoc()) {
            $options .= "<option value='" . $row_project["Pname"] . "'>" . $row_project["Pname"] . "</option>";
      }
      echo $options;
	} else {
  		//echo "<option value='' disabled>No projects found</option>";
          echo "<option value='' disabled>print_r($department_number)</option>";
  }
}


?>