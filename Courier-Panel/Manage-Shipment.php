<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Shipments</title>
    <link rel="stylesheet" href="stylesheets/admin-view.css">
    <script src="https://kit.fontawesome.com/6d6b20398e.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">
<div class="container">
  <nav>
    <ul>
      <li><a href="Assigned-Shipment.php" class="logo">
        <img src="img/express.jpg" alt="">
        <span class="nav-item">Courier</span>
      <li><a href="Assigned-Shipment.php">
        <i class="fa-solid fa-people-carry-box"></i>
        <span class="nav-item">Assigned Shipments</span>
      </a></li>
      <li><a href="Manage-Shipment.php">
        <i class="fa-solid fa-list-check"></i>
        <span class="nav-item">Manage Shipments</span>
      </a></li>

      <li><a href="../login.php" class="logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <span class="nav-item">Log out</span>
      </a></li>
    </ul>

  </nav>

  </div>

  <?php

include '../Connection.php';

$sql1 = "SELECT * FROM shipment where delievery_status='Not Delievered' AND assign_date != 'NULL';";

$sql1_query = $conn->query($sql1);

echo "
  <section style='margin-left:140px;
  margin-top: -420px;
  width:80%;
  margin-right: 10px;
  margin-bottom: 20px;
  text-transform: capitalize;
  font-size: 20px;'>
  <div style=' width: 100%;
  padding: 25px;
  background: #ffff;
  border-radius: 20px;
'>
  <h1>Shipment List</h1>

  <table style='font-size: 15px; border-collapse: collapse;'>
    <thead>
      <tr>
        <th>Shipment ID</th>
        <th>Shipper Name</th>
        <th>Receiver Name</th>
        <th>Delievery Date</th>
        <th>Delievery Status</th>
        <th>Amount Status</th>
        <th>Address</th>
        <th>
        Operations
        </th>
        </tr>
    </thead>";
      

while($row = $sql1_query->fetch_assoc()){
  
  $sql2 = "SELECT shipper.s_name,shipper.s_id, receiver.r_name,receiver.r_address,receiver.r_email FROM contain NATURAL JOIN shipper NATURAL join receiver NATURAL join has where sh_id = $row[sh_id];";
  
  $sql2_query = $conn->query($sql2);
  
  while($row2 = $sql2_query->fetch_assoc()) {
    
    echo "
    <tr>
    <td>".$row['sh_id']."</td>
    <td>".$row2['s_name']."</td>
    <td>".$row2['r_name']."</td>
    <td>".$row['delievery_date']."</td>
    <td>".$row['delievery_status']."</td>
    <td>".$row['amount_status']."</td>
    <td>".$row2['r_address']."</td>
    <td>
    <a href='c_update_sh.php?assign_date=$row[assign_date] & d_date=$row[delievery_date] & amount_status=$row[amount_status] & sh_id=$row[sh_id] & sh_name=$row[sh_name] & r_name=$row2[r_name] & d_status=$row[delievery_status]' style='width: 10%; margin-left:-18px; margin-right: 10px; color: green; font-weight: bold;'>Update</a>
    </td>
    </tr>";
  }//inner while
  
}//outer while

echo"
</table>
</div>
</section>";

?>
</body>
</html>