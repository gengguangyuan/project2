<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$action = $_POST['action'];
  switch ($action) {
  	case 'add_employee':
  		header("Location: add_employee.php");
        exit;
    case 'add_department':
         header("Location: add_department.php");
         exit;
    case 'add_project':
         header("Location: add_project.php");
        exit;
    case 'remove_employee':
         header("Location: remove_employee.php");
         exit;
  }
}
?>