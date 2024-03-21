<?php
  require "db_connection.php";
  if($_POST) {
    $name = $_POST["name"];
    $contact_number = $_POST["contact"];
    $address = $_POST["cadd"];
    $doctor_name = $_POST["doc_name"];
    $doctor_address = $_POST["dadd"];

    $query = "SELECT * FROM customers WHERE CONTACT_NUMBER = '$contact_number'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Customer ".$row['NAME']." with contact number $contact_number already exists!";
    else {
      $query = "INSERT INTO customers (NAME, CONTACT_NUMBER, ADDRESS, DOCTOR_NAME, DOCTOR_ADDRESS) VALUES('$name', '$contact_number', '$address', '$doctor_name', '$doctor_address')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added...";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
