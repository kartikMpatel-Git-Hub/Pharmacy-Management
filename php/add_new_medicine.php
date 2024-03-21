<?php
  require "db_connection.php";
  if($con) {
    $name = ($_POST["name"]);
    $packing = strtoupper($_POST["packing"]);
    $generic_name = ($_POST["generic_name"]);
    $suppliers_name = $_POST["suppliers_name"];

    $query = "SELECT * FROM medicines WHERE UPPER(NAME) = '".strtoupper($name)."' AND UPPER(PACKING) = '".strtoupper($packing)."' AND UPPER(SUPPLIER_NAME) = '".strtoupper($suppliers_name)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Medicine $name with $packing already exists by supplier $suppliers_name!";
    else {
      $query = "INSERT INTO medicines (NAME, PACKING, GENERIC_NAME, SUPPLIER_NAME) VALUES('$name', '$packing', '$generic_name', '$suppliers_name')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added...";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
