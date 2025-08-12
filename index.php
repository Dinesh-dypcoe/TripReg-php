<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "trip";
    $port = 3307; 

    // Create connection
    $con = mysqli_connect($server, $username, $password, $database, $port);

    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `trip`.`students` (`name`, `age`, `gender`, `email`, `phone`, `description`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$description', current_timestamp());";


    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="dyp_img.png" alt="dypcoe">
    <div class="container">
        <h1>Welcome to D.Y.Patil COE US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip! </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    
</body>
</html>
