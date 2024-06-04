<?php

  include '../Connection.php';

  $c_id = $_GET['c_id'];

  $sql = "delete from courier where c_id = $c_id;";

  if($conn->query($sql)){

    echo '<script>alert("Courier Data deleted Successfully")</script>';
  }
  else{
    echo '<script>alert("Error!!!!! Could not delete Data")</script>';
  }

  header('Location: manage-courier.php');
  exit;


?>