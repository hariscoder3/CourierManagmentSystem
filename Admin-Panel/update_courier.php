<?php

  include '../Connection.php';

  $c_name = $_GET['c_name'];
  $c_id = $_GET['c_id'];
  $c_address = $_GET['c_address'];
  $c_email = $_GET['c_email'];
  $dob = $_GET['dob'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Courier</title>
    <link rel="stylesheet" href="stylesheets/add.css">
    <script src="https://kit.fontawesome.com/6d6b20398e.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">
    <div class="back">
        <a href="admin-view.php">
            <i class="fa-solid fa-arrow-left-long"></i>
            <span>Go Back</span>
        </a>
    </div>
    <div class="container">
        <div class="title">Edit Courier</div>
        <form method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Courier Name</span>
                    <input type="text" name="c_name" value="<?php
                    echo $c_name;
                    ?>" readonly>
                </div> 
                <div class="input-box">
                    <span class="details">Courier Address</span>
                    <input type="text" name="c_address" value="<?php
                    echo $c_address;
                    ?>" readonly>
                </div> 
                <div class="input-box">
                    <span class="details">Courier ID</span>
                    <input type="text" name="c_id" value="<?php
                    echo $c_id;
                    ?>" readonly>
                </div>
                
                <div class="input-box">
                    <span class="details">Courier Email</span>
                    <input type="email" name="c_email" value="<?php
                    echo $c_email;
                    ?>" readonly>
                </div> 
              
                <div class="input-box">
                    <span class="details">Date of Birth</span>
                    <input type="text" name="dob" value="<?php
                    echo $dob;
                    ?>" readonly>
                </div>
                
                
                <div class="radio-buttons-1"  style="margin-right: 480px; padding-top: 4px;">
                    <span class="status-details">Status</span>
                    <div class="btn">
                        <input type="radio" id="active" name="status" value="Active">
                        <label for="html">Active</label>
                    </div>
                    <div class="btn">
                        <input type="radio" id="inactive" name="status" value="Inactive">
                        <label for="css">Inactive</label>
                    </div>
                </div>
                
            </div>   
            <div class="button">
                <input type="submit" value="Confirm" name="sub">
        </form>
    </div>
</body>
</html>

<?php

  if(isset($_POST['sub'])){

    $new_status = $_POST['status'];

    // $sql = "update courier set status = $new_status where c_id = $c_id;";
    $sql = "UPDATE `courier` SET `status` = '$new_status' WHERE `courier`.`c_id` = $c_id;";

    if($conn->query($sql)){
        echo'<script>alert("Data Updated Successfully")</script>';
    }
    else{
        echo '<script>alert("Error !!!! Data Not Updated")</script>';
    }

    header("location:./manage-courier.php");
  }

?>
