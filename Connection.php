<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "courier_management_system";

        $conn = mysqli_connect($servername , $username , $password , 
        $database) or die("Cannot connect to 
        Database".mysqli_connect_error());

        // $conn = mysqli_connect($servername, $username, $password, $database) or die("Cannot connect to database".mysqli_connect_error());
    ?>
    
</body>
</html>