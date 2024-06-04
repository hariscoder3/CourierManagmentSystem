<?php

  include '../Connection.php';

  $query1 = "SELECT * FROM shipment;";

  $execute1 = $conn->query($query1);
  $count1=$execute1->num_rows;
  if($count1==NULL){
     $count1=0;
  }

  
  $query2 = "SELECT * FROM shipment where delievery_status='delievered';";

  $execute2 = $conn->query($query2);
  $count2=$execute2->num_rows;
  if($count2==NULL){
    $count2=0;
  }
  
  $query3 = "SELECT * FROM shipment where assign_date != 'NULL' AND delievery_status != 'Delievered';"; 
  // ===>Return two rows

  $execute3 = $conn->query($query3);
  // return number of rows
  @$count3=$execute3->num_rows;
  if($count3==NULL){
    $count3=0;
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manager</title>
  <link rel="stylesheet" href="stylesheets/main-style.css" />
  <script src="https://kit.fontawesome.com/6d6b20398e.js" crossorigin="anonymous"></script>
  <!-- Font Awesome Cdn Link -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/> -->
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">
  <div class="container">
    <nav>
      <ul>
        <li id="nav-bar-click"><a href="admin-view.php" class="logo">
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

    <!-- HighLights -->

    <main>
    
      <h1>HighLights</h1>
      <div class="dash-cards">
          <div class="cards">
              <div>
                  <h1><?php
                  echo $count1;
                  ?></h1>
                  <span>Total Shipments</span>
              </div>
              <div>
                  <i class="fa-regular fa-container-storage"></i>
              </div>
          </div>

          <div class="cards">
              <div>
                  <h1><?php
                  echo $count3;
                  ?></h1>
                  <span>Assigned Shipments</span>
              </div>
              <div>
                  <i class="fa-regular fa-dolly"></i>
              </div>
          </div>

          <div class="cards">
              <div>
                  <h1><?php
                  echo $count2;
                  ?></h1>
                  <span>Delievered</span>
              </div>
              <div>
                  <i class="fa-solid fa-truck"></i>
              </div>
          </div>
      </div>

  </main>
      
</div>
      
      
      
  <?php

      include '../Connection.php';

      $sql1 = "SELECT sh_id,delievery_date,delievery_status FROM shipment where shipment.delievery_status='Delievered';";

      $sql1_query = $conn->query($sql1);

      echo "
        <section style='margin-left:180px;
        margin-top: -550px;
        text-transform: capitalize;
        font-size: 20px;'>
        <div style=' width: 90%;
        padding: 25px;
        background: #ffff;
        border-radius: 20px;
      '>
        <h1>Recent Delieveries</h1>

        <table style='font-size: 15px; border-collapse: collapse;'>
          <thead>
            <tr>
              <th>Shipment ID</th>
              <th>Shipper Name</th>
              <th>Receiver Name</th>
              <th>Delievery Date</th>
              <th>Delievery Status</th>
              <th>Address</th>
            </tr>
          </thead>";
            

      while($row = $sql1_query->fetch_assoc()){
        
        $sql2 = "SELECT shipper.s_name, receiver.r_name,receiver.r_address FROM contain NATURAL JOIN shipper NATURAL join receiver NATURAL join has where sh_id = $row[sh_id];";
        
        $sql2_query = $conn->query($sql2);
        
        while($row2 = $sql2_query->fetch_assoc()) {
          
          echo "
          <tr>
          <td>".$row['sh_id']."</td>
          <td>".$row2['s_name']."</td>
          <td>".$row2['r_name']."</td>
          <td>".$row['delievery_date']."</td>
          <td>".$row['delievery_status']."</td>
          <td>".$row2['r_address']."</td>
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