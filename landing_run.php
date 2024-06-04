
<?php

if(isset($_POST['submit'])){

  $id = $_POST['numb'];

  
  include 'Connection.php';

  $sql1 = "SELECT * FROM shipment where sh_id=$id;";

  $sql1_query = $conn->query($sql1);

  $row = $sql1_query->num_rows;
  $row1 = $sql1_query->fetch_assoc();

  if($row==1){

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
    </tr>
    </thead>";
      
      $sql2 = "SELECT shipper.s_name,shipper.s_id, receiver.r_name,receiver.r_address,receiver.r_email FROM contain NATURAL JOIN shipper NATURAL join receiver NATURAL join has where sh_id = $row1[sh_id];";
      
      $sql2_query = $conn->query($sql2);
      $row2 = $sql2_query->fetch_assoc();
    
      echo "
      <tr>
      <td>".$row1['sh_id']."</td>
      <td>".$row2['s_name']."</td>
      <td>".$row2['r_name']."</td>
      <td>".$row1['delievery_date']."</td>
      <td>".$row1['delievery_status']."</td>
      <td>".$row1['amount_status']."</td>
      <td>".$row2['r_address']."</td>
      </tr>";
    
  
  echo"
  </table>
  </div>
  </section>";

  }
}

?>