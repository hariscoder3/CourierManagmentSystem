<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Courier Status</title>
  <link rel="stylesheet" href="stylesheets/cou-style.css" />
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


  </div>

  <?php

      include '../Connection.php';

      $sql1 = "SELECT * from courier;";

      $sql1_query = $conn->query($sql1);

      echo "
        <section style='margin-left:180px;
        margin-top: -450px;
        overflow: hidden;
        text-transform: capitalize;
        font-size: 20px;'>
        <div style=' width: 90%;
        padding: 25px;
        background: #ffff;
        border-radius: 20px;'>
        <h1>Couriers List</h1>

        <table style='font-size: 15px; border-collapse: collapse;'>
          <thead>
            <tr>
              <th>Courier ID</th>
              <th>Courier Name</th>
              <th>Courier Email</th>
              <th>Gender</th>
              <th>Courier Status</th>
              <th>Address</th>
              <th>Operations
              <th></th>
              </th>
             </tr>
          </thead>";
            

      while($row = $sql1_query->fetch_assoc()){

          echo "
          <tr>
          <td>".$row['c_id']."</td>
          <td>".$row['c_name']."</td>
          <td>".$row['c_email']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['status']."</td>
          <td>".$row['address']."</td>
          <td style='padding: 10px'><a href='delete_courier.php?c_id=$row[c_id]' style='width: 20%; color: green; font-weight: bold;'>Delete</a>
          </td>
          <td>
          <a href='update_courier.php?c_id=$row[c_id] & c_name=$row[c_name] & c_email=$row[c_email] & c_address=$row[address] & dob=$row[dob]' style='width:20%; margin-right: 20px; margin-left: -50px; color: green; font-weight: bold;'>Update</a></td>      
          </tr>";
                  
      }//outer while
      
      echo"
      </table>
      </div>
      </section>";
      
      ?>


</body>
</html>
