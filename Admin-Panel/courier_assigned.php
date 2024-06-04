<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Assigned</title>
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">

    
<form action="" method="post" style="margin: 200px 300px 250px 300px">
    <label style="font-weight: bold; font-size: 18px;">Enter Shipment Assign Date</label>
    <input type="date" name="date">
    <input type="submit" name="sub">
</form>

<?php

    include '../Connection.php';
    
    if(isset($_POST['sub'])){

        $update_date =  "UPDATE `shipment` SET `assign_date` = '$_POST[date]' WHERE `shipment`.`sh_id` =$_GET[sh_id];";
        $run = $conn->query($update_date);

    $sh_id = $_GET['sh_id'];
    $c_id = $_GET['c_id'];

    $sql = "INSERT INTO `assign`(`m_id`,`sh_id`,`c_id`) VALUES ('$_SESSION[m_id]','$sh_id','$c_id');";
    
    if($conn->query($sql)==TRUE) {
        $sql2 = "INSERT INTO `manages`(`c_id`,`sh_id`) VALUES ('$c_id','$sh_id');";
        
        if($conn->query($sql2)==TRUE) {
        
            $q = "UPDATE `courier` SET `status` = 'Active' WHERE `courier`.`c_id` = $c_id;";
                $execute_q = $conn->query($q);
        
            echo '<script>alert("Shipment Assigned Successfully")</script>';
        }
        else {
                echo '<script>alert("Shipment Assigned but error in manages by courier")</script>';
            }
    }
    else{
        echo '<script>alert("ERROR !!!!! Shipement Not Assigned")</script>';
    }
}

?>
    
</body>
</html>