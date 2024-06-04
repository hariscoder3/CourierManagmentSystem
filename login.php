<?Php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="login-style.css">
  </head>
  <body>

  <?php

    include 'connection.php';

    // if user clicks on submit button 
    if(isset($_POST['sub'])){
      
      // save user entered id and password
      $id = $_POST['id'];
      $_SESSION["m_id"] = $id;
      $password = $_POST['pass'];

      // For manager end verification of login
      $sql1 = "SELECT * FROM manager where m_id='$id';";
      $check_id = $conn->query($sql1);
      // $check_id = mysqli_connect($conn, $query);

      $row = $check_id->fetch_assoc();
      if($check_id->num_rows==1){
        $db_id = $row['m_id'];
      }

      // For Courier end verification of login
      $q_courier = "SELECT * FROM `courier` where c_id='$id';";
      $q_courier_run = $conn->query($q_courier);
      $row1 = $q_courier_run->fetch_assoc();
      if($q_courier_run->num_rows==1){
        $db_id_cou = $row1['c_id'];
      }

      // END of store Courier id from database
      
      //========= verification start
      // check manager id
      if($check_id->num_rows==1 && $db_id==$id){

        $db_pass = $row['m_password'];

        // if id verify then check password
        if($password == $db_pass){
          
          // id is stored in session variable for furthur use
          $_SESSION["m_id"] = $id;
          
          ?>
          <!-- to redirect login page to dashboard use javascript -->
          <script>
            location.replace("Admin-Panel/admin-view.php");
          </script>

          <?php
        }
        else{
          echo '<script>alert("Incorrect Password")</script>';        
        }
      }
      else if($q_courier_run->num_rows==1 && $db_id_cou==$id){

        if($password == $row1['c_password']){
          $_SESSION["id"] = $id;
          echo"
          <script>
            location.replace('Courier-Panel/Assigned-Shipment.php');
          </script>";
        }
        else{
            echo '<script>alert("Incorrect Password")</script>';        
        }
      }
      else{
        echo '<script>alert("Invalid ID")</script>';
      }
    } //isset if
  
  ?>


    <div class="login-box">
        <h2>Login</h2>
      <form method="post">
        <div class="user-box">
          <input type="text" name="id" required autocomplete="off">
          <label for="">ID</label>
        </div>
        <div class="user-box">
          <input type="password" name="pass" required>
          <label for="">Password</label>
        </div>
          <input type="submit" name="sub" style="background-color: #343434; color:white; border-radius: 20px; padding: 10px; cursor: pointer; border: none;">
      </form>
    </div>
  </body>
</html>
