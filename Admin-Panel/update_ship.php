<?php

    $sh_id = $_GET['sh_id'];
    $sh_name = $_GET['sh_name'];
    $r_name = $_GET['r_name'];

    $d_date = $_GET['d_date'];
    $d_status = $_GET['d_status'];
    $assign_date = $_GET['assign_date'];
    $amount_status = $_GET['amount_status'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shipment</title>
    <link rel="stylesheet" href="stylesheets/add.css">
    <script src="https://kit.fontawesome.com/6d6b20398e.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">
    <div class="back">
        <a href="manage-shipment.php">
            <i class="fa-solid fa-arrow-left-long"></i>
            <span>Go Back</span>
        </a>
    </div>
    <div class="container">
        <div class="title">Edit Shipment</div>
        <form method="post">
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Receiver Name</span>
                    <input type="text" name="r-name" placeholder="Receiver Name" value="<?php
                    echo $r_name;?>" readonly>
                </div> 
              
                <div class="input-box">
                    <span class="details">Shipment name</span>
                    <input type="text" name="sh-name" placeholder="Shipment name" value="<?php
                    echo $sh_name;?>" readonly>
                </div> 
                
                <div class="input-box">
                    <span class="details">Shipment ID</span>
                    <input type="text" value="<?php
                    echo $sh_id;?>" readonly>
                </div> 

                <div class="input-box">
                    <span class="details">Assign Date</span>
                    <input type="date" name="assign-date">
                </div>

                <div class="input-box">
                    <span class="details">Delivery Date</span>
                    <input type="date" name="delievery-date">
                </div>
                <div class="radio-buttons" style="margin: 44px 370px 0px 0px;">
                    <span class="details">Amount Status</span>
                    <div class="btn">
                        <input type="radio" id="cod" name="payment" value="Collected">
                        <label>Collected</label>
                    </div>
                    <div class="btn">
                        <input type="radio" id="bank-card" name="payment" value="Not Collected">
                        <label>Not Collected</label>
                    </div>
                </div> 
                <div class="radio-buttons-2" style="margin-right: 430px; padding-top: 4px;">
                    <span class="details">Delievery Status</span>
                    <div class="btn">
                        <input type="radio" id="assigned" name="delievery-status" value="Delievered">
                        <label for="assigned">Delievered</label>
                    </div>
                    <div class="btn">
                        <input type="radio" id="not-assigned" name="delievery-status" value="Not Delievered">
                        <label for="css">Not Delievered</label>
                    </div>
                </div>
            </div>   
            <div class="button">
                <input type="submit" value="Confirm" name="submit">
            </div>
        </form>
        
    </div>

</body>
</html>

<?php

    include '../Connection.php';

    if(isset($_POST['submit'])){

        $new_date = $_POST['delievery-date'];
        $new_amount_status = $_POST['payment'];
        $new_d_status = $_POST['delievery-status'];
        $new_assign_date = $_POST['assign-date'];

        if(empty($new_date)){
            $new_date = $d_date;
        }
        if(empty($new_amount_status)){
            $new_amount_status = $amount_status;
        }
        if(empty($new_assign_date)) {
            $new_assign_date = $assign_date;
        }
        if(empty($new_d_status)){
            $new_d_status = $d_status;
        }
        

        $sql = "UPDATE `shipment` SET `delievery_date` = '$new_date', `delievery_status` = '$new_d_status',`assign_date` = '$new_assign_date', `amount_status` = '$new_amount_status' WHERE `shipment`.`sh_id` = $sh_id;";

        if($conn->query($sql) === TRUE) {

            echo '<script>alert("Record Updated Successfully");</script>';
        }
        else{
            echo '<script>alert("Error !!!! Record Not Updated");</script>';
        }


    }

?>
