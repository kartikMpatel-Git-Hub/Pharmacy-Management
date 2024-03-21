<?php
  require "db_connection.php";
  if($_POST) {
    $name = ($_POST["name"]);
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $address = ($_POST["address"]);

    $query = "SELECT * FROM suppliers WHERE UPPER(NAME) = '".strtoupper($name)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Supplier with name $name already exists!";
    else {
      $query = "INSERT INTO suppliers (NAME, EMAIL, CONTACT_NUMBER, ADDRESS) VALUES('$name', '$email', '$contact_number', '$address')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added...";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
