<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment List</title>
    <link rel="stylesheet" href="stylesheets/sh-style.css">
    <script src="https://kit.fontawesome.com/6d6b20398e.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">
<div class="container">
  <nav>
    <ul>
      <li><a href="admin-view.php" class="logo">
        <img src="img/express.jpg" alt="">
        <span class="nav-item">Manager</span>
      </a></li>
      <li><a href="admin-view.php">
        <i class="fa-solid fa-gauge"></i>
        <span class="nav-item">Dashboard</span>
      </a></li>
      <li><a href="reg-courier.php">
        <i class="fa-solid fa-user-plus"></i>
        <span class="nav-item">Add Courier</span>
      </a></li>
      <li><a href="add-shipment.php">
        <i class="fa-solid fa-circle-plus"></i>
        <span class="nav-item">Add Shipment</span>
      </a></li>
      <li><a href="assign-shipment.php">
        <i class="fa-solid fa-people-carry-box"></i>
        <span class="nav-item">Assign Shipment</span>
      </a></li>

      <li><a href="manage-courier.php">
        <i class="fa-solid fa-user-check"></i>
        <span class="nav-item">Manage Courier</span>
      </a></li>

        <li><a href="manage-shipment.php">
          <i class="fa-solid fa-file-circle-plus"></i>
          <span class="nav-item">Manage Shipment</span>
        </a></li>


      <li><a href="logout.php" class="logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <span class="nav-item">Log out</span>
      </a></li>
    </ul>
  </nav>


    <?php

      include '../Connection.php';

      $sql1 = "SELECT * FROM shipment;";

      $sql1_query = $conn->query($sql1);

      echo "
        <section style='margin-left:40px;
        margin-top: 60px;
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
              <th>
              </th>
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
          <a href='delete_ship.php?sh_id=$row[sh_id] & s_id=$row2[s_id] & r_email=$row2[r_email]' style='width: 10%; color: green; font-weight: bold;'>Delete</a>
          </td>
          <td>
          <a href='update_ship.php?assign_date=$row[assign_date] & d_date=$row[delievery_date] & amount_status=$row[amount_status] & sh_id=$row[sh_id] & sh_name=$row[sh_name] & r_name=$row2[r_name] & d_status=$row[delievery_status]' style='width: 10%; margin-left:-18px; margin-right: 10px; color: green; font-weight: bold;'>Update</a>
          </td>
          </tr>";
        }//inner while
        
      }//outer while
      
      echo"
      </table>
      </div>
      </section>";
      
      ?>
</div>
</body>
</html>