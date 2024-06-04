<?php

    include '../Connection.php';

    $id = $_GET['sh_id'];
    $s_id = $_GET['s_id'];
    $r_email = $_GET['r_email'];
    
    $sql = "delete from shipment where sh_id='$id';";
    $sql2 = "delete from shipper where s_id='$s_id';";
    $sql3 = "delete from receiver where r_email='$r_email';";
    $sql4 = "delete from assign where sh_id='$id';";
    $sql5 = "delete from manages where sh_id='$id';";

    if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE && $conn->query($sql5) === TRUE){

        echo '<script>alert("Record Deleted Successfully")</script>';
    }
    else{
        echo '<script>alert("Failed to delete Record")</script>';

    }

    header("location: ./manage-shipment.php");

?>