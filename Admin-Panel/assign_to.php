<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="stylesheets/cou-style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        table{
        border-collapse: collapse;
        margin: 10px 0px 50px 100px;
        align-items: center;
        font-size: 15px;
        min-width: 80%;
        overflow: hidden;
        border-radius: 5px 5px 0 0;
        }
        table thead tr{
        color: #fff;
        background: #34AF6D;
        text-align: left;
        font-weight: bold;
        }
        table th,
        table td{
        padding: 25px 10px;
        }
        table tbody tr{
        border-bottom: 1px solid #ddd;
        }
        table tbody tr:nth-of-type(odd){
        background: #f3f3f3;
        }
        table tbody tr:nth-of-type(even){
        background: #ffff;
        }
        table tbody tr:last-of-type{
        border-bottom: 2px solid #4AD489;
        }
        h1{
            padding: 10px 0px 0px 100px;
        }
    </style>
    <title>Select Courier</title>
</head>
<body  style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">

<h1>Select Courier</h1>
    
<?php

include '../Connection.php';

$sh_id = $_GET['sh_id'];

$sql = "SELECT * FROM `courier`;";

$sql_query = $conn->query($sql);

if($sql_query==TRUE) {
    
    echo"
    <table>
        <thead style='font-size: 20px;'>
            <td>Courier ID</td>
            <td>Courier Name</td>
            <td>Courier Status</td>
            <td>Assigned</td>
        </thead>";

    while($row = $sql_query->fetch_assoc()){
        echo"
        <tr style='font-size: 18px'>
            <td>".$row['c_id']."</td>
            <td>".$row['c_name']."</td>
            <td>".$row['status']."</td>
            <td><a href='courier_assigned.php?sh_id=$sh_id & c_id=$row[c_id]' style='width: 10%; margin-left:-10px; margin-right: 10px; color: green; font-weight: bold; text-decoration: none;border: 1px solid black; border-radius: 20px; padding: 6px;'>
            Assigned
            </a></td>
        </tr>
        ";

    }


    echo "</table>";
}
else{
    echo'<script>alert("ERORRR!!!!")</script>';
}

?>

</body>
</html>