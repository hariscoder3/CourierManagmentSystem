<?php

    session_start();
    include '../Connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courier</title>
    <link rel="stylesheet" href="stylesheets/add.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> -->
    <script src="https://kit.fontawesome.com/6d6b20398e.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(img/back3.jpg); backdrop-filter: blur(5px)">
    <div class="back">
        <a href="admin-view.php">
            <i class="fa-solid fa-arrow-left-long"></i>
            <span>Go Back</span>
        </a>
    </div>
    <div class="container">
        <div class="title">Add Courier</div>
        <form method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Courier Name</span>
                    <input type="text" name="c_name" placeholder="Name" required>
                </div> 
                <div class="input-box">
                    <span class="details">Courier Address</span>
                    <input type="text" name="c_address" placeholder="Courier Address" required>
                </div> 
                <div class="input-box">
                    <span class="details">Courier ID</span>
                    <input type="text" name="c_id" value = "auto generated" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>  
                <div class="input-box">
                    <span class="details">Courier Email</span>
                    <input type="email" name="c_email" placeholder="Courier Email" required>
                </div> 
              
                <div class="input-box">
                    <span class="details">Date of Birth</span>
                    <input type="date" name="dob" placeholder="DOB" required>
                </div>
                <div class="radio-buttons">
                    <span class="status-details">Gender</span>
                    <div class="btn">
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="html">Male</label>
                    </div>
                    <div class="btn">
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="css">Female</label>
                    </div>
                </div>

                <div class="radio-buttons-1"  style="margin-right: 480px; padding-top: 4px;">
                    <span class="status-details">Status</span>
                    <div class="btn">
                        <input type="radio" id="active" name="status" value="Active">
                        <label for="html">Active</label>
                    </div>
                    <div class="btn">
                        <input type="radio" id="inactive" name="status" value="Inactive">
                        <label for="css">Inactive</label>
                    </div>
                </div>
                
            </div>   
            <div class="button">
                <input type="submit" value="Confirm" name="sub">
        </form>
    </div>
</body>
</html>

<?php

// include 'login.php';

if(isset($_POST['sub'])){    
    
    $name = $_POST['c_name'];
    $address = $_POST['c_address'];
    $password = $_POST['password'];
    $email = $_POST['c_email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

        $sql = "INSERT INTO `courier` (`c_id`, `c_name`, `c_email`, `address`,`gender`,`status`, `dob`,`c_password`,`m_id`) VALUES (NULL, '$name', '$email', '$address', '$gender', '$status', '$dob', '$password', '$_SESSION[m_id]');";

     
        if($conn->query($sql) === TRUE) {

            echo '<script>alert("Courier is Added Successfully")</script>';
            
        }
        else{

            echo '<script>alert("Not added !!!!!!! Error")</script>';

        }

    }
?>