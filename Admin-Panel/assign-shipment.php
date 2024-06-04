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

  <!-- ================END NAV BAR===================== -->

  <h2 style="margin: 40px">Assign Shipment By Location</h2>
  <form style="margin-top:100px; margin-left: -350px;" method="post">
        <label>location</label>
        <select name="location">
          <option value="">select one</option>
          <option value="CITY HOUSING">CITY HOUSING</option>
          <option value="WAPDA TOWN">WAPDA TOWN</option>
          <option value="NOSHEHRA ROAD">NOSHEHRA ROAD</option>
          <option value="SATELLITE TOWN">SATELLITE TOWN</option>
          <option value="DC COLONY">DC COLONY</option>
          <option value="URDU BAZAR">URDU BAZAR</option>
          <option value="JINNAH ROAD">JINNAH ROAD</option>
        </select>
       <input type="submit" value="search" name="sub">

  </form>

  <?php


    if(isset($_POST['sub'])){

      $location = $_POST['location'];

    include '../Connection.php';

    $sql1 = "SELECT * FROM shipment where delievery_status!='Delievered'";

    if($conn->query($sql1)==TRUE){

      $sql1_query = $conn->query($sql1);
      
      echo "
      <section style='margin-left:40px;
        margin-top: 200px;
        margin-right: 10px;
        margin-left:-300px;
        margin-bottom: 20px;
        text-transform: capitalize;
        font-size: 20px;'>
        <div style=' width: 100%;
        padding: 25px;
        background: #ffff;
        border-radius: 20px;
        '>

        <table style='font-size: 15px; border-collapse: collapse;'>
        <thead>
        <tr>
        <th>Shipment ID</th>
        <th>Receiver Name</th>
        <th>Delievery Status</th>
        <th>Amount Status</th>
        <th>Address</th>
        <th>Assigned TO</th>
      </thead>";
      

      while($row = $sql1_query->fetch_assoc()){
  
      $sql2 = "SELECT receiver.r_name,receiver.r_address FROM contain NATURAL JOIN shipper NATURAL join receiver NATURAL join has where sh_id = $row[sh_id] AND receiver.r_address LIKE '%$location%';";
      
      $sql2_query = $conn->query($sql2);
      
        while($row2 = $sql2_query->fetch_assoc()) {
          
          echo "
          <tr>
          <td>".$row['sh_id']."</td>
          <td>".$row2['r_name']."</td>
          <td>".$row['delievery_status']."</td>
          <td>".$row['amount_status']."</td>
          <td>".$row2['r_address']."</td>
          <td><a href='assign_to.php?sh_id=$row[sh_id]' style='width: 100%; border: 2px solid black; border-radius: 10px; padding: 2px; background: black; color: white; cursor: pointer;'>Assigned To</a></td>
          </tr>";
        }//inner while
        
      }//outer while
      
    echo"
    </table>
    </div>
    </section>";
  
  }
    
  }//isset close
  
  ?>
      


</body>
</html>