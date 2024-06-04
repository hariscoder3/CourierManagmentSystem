<?php

    session_start();
    include '../Connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shipment</title>
    <link rel="stylesheet" href="stylesheets/add.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> -->
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
        <div class="title">Shipment Details</div>
        <form method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Shipper Name</span>
                    <input type="text" name="s-name" placeholder="Shipper Name" required>
                </div> 

                <div class="input-box">
                    <span class="details">Receiver Name</span>
                    <input type="text" name="r-name" placeholder="Receiver Name" required>
                </div> 

                <div class="input-box">
                    <span class="details">Shipper email</span>
                    <input type="email" name="s-email" placeholder="Shipper email" required>
                </div>

                <div class="input-box">
                    <span class="details">Receiver email</span>
                    <input type="email" name="r-email" placeholder="abc@gmail.com" required>
                </div> 

                <div class="input-box">
                    <span class="details">Shipper id</span>
                    <input type="number" name="s-id" placeholder="Shipper id" required>
                </div>
                
                <div class="input-box">
                    <span class="details">Receiver Address </span>
                    <input type="text" id = "address" onblur="capitalize()" name="r-address" placeholder="Receiver Address" required>
                </div>
              
                <div class="input-box">
                    <span class="details">Shipment name</span>
                    <input type="text" name="sh-name" placeholder="Shipment name" required>
                </div> 
                
                <div class="input-box">
                    <span class="details">Shipment ID</span>
                    <input type="text" value="auto generated" readonly>
                </div> 

                <div class="input-box">
                    <span class="details">Shipment Weight</span>
                    <input type="text" name="sh-weight" placeholder="Shipment Weight" required>
                </div> 
               
                <div class="input-box">
                    <span class="details">Shipment Price</span>
                    <input type="number" name="sh-price" placeholder="Shipment Price" required>
                </div> 
                <div class="input-box">
                    <span class="details">Assign Date</span>
                    <input type="date" name="assign-date">
                </div>
                <div class="input-box">
                    <span class="details">Delivery Date</span>
                    <input type="date" name="delievery-date" >
                </div>
                <div class="radio-buttons">
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

<!-- Javascript code to convert lowercase input to uppercase -->

<script>

    function capitalize(){
        let x = document.getElementById("address");
        x.value = x.value.toUpperCase();
    }

</script>

<?php

    if(isset($_POST['submit'])) {

        $s_name = $_POST['s-name'];      
        $s_id = $_POST['s-id'];      
        $s_email = $_POST['s-email'];

        $r_name = $_POST['r-name'];
        $r_email = $_POST['r-email'];
        $r_address = $_POST['r-address'];

        $sh_name = $_POST['sh-name'];
        $sh_weight = $_POST['sh-weight'];
        $sh_price = $_POST['sh-price'];
        $assign_date = $_POST['assign-date'];
        $delievery_date = $_POST['delievery-date'];
        $delievery_status = $_POST['delievery-status'];
        $amount_status = $_POST['payment'];

        // insert into shipper table
        $sql1 = "INSERT INTO `shipper` (`s_id`, `s_name`, `s_email`, `m_id`) VALUES ('$s_id', '$s_name', '$s_email', '$_SESSION[m_id]');";

        // insert into receiver table
        $sql2 = "INSERT INTO `receiver` (`r_name`, `r_address`, `r_email`) VALUES ('$r_name',  '$r_address', '$r_email');";

        // insert into shipment table
        $sql3 = "INSERT INTO `shipment` (`sh_id`, `sh_name`, `sh_price`, `sh_weight`, `assign_date`, `delievery_date`, `delievery_status`, `amount_status`, `m_id`) VALUES (NULL, '$sh_name', '$sh_price', '$sh_weight', '$assign_date', '$delievery_date', '$delievery_status', '$amount_status', '$_SESSION[m_id]');";

        // shipper and receiver relation table also be filled
        $sql4 = "INSERT INTO `has` (`s_id`, `r_email`) VALUES ('$s_id', '$r_email');";

        $sql1_query = $conn->query($sql1);
        $sql2_query = $conn->query($sql2);
        $sql3_query = $conn->query($sql3);
        $sql4_query = $conn->query($sql4);

        // get shipment auto generated id
        $sql5 = "SELECT * from shipment where sh_name='$sh_name' AND sh_price='$sh_price';";

        $sql5_query = $conn->query($sql5);
        $row = $sql5_query->fetch_assoc();
        $sh_id = $row['sh_id'];
        
        // insert shipper and shipment relation table named as 'contain'
        $sql6 = "INSERT INTO `contain` (`s_id`, `sh_id`) VALUES ('$s_id', '$sh_id');";
        
        $sql6_query = $conn->query($sql6);

        // check if all queries are run
        if(($sql1_query===True) && ($sql2_query===True) && ($sql3_query===True) && ($sql4_query===True) && ($sql6_query===True)){

            echo '<script>alert("Shipment Added Successfully")</script>';
        }
        else {
            echo '<script>alert("Error!!!!")</script>';
        }

    }

?>