<?php

include("dbcon.php");


if(isset($_POST["first_name"])){
    $first_name =     $_POST["first_name"];
    $last_name =      $_POST["last_name"];
    $email =          $_POST["email"];
    $password =       $_POST["password"];
    $date_of_birth =  $_POST["date_of_birth"];
    $phone =          $_POST["phone"];
    $gender =         $_POST["gender"];
    $city =           $_POST["city"];
    $country =        $_POST["country"];

    $check_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {

        ?>
        <script>
        window.location = 'index.php?inserted=2';
    </script>
        <?php

    } 

    else {
        // If email does not exist, proceed with the insertion of data in the form
        $insert_query = "INSERT INTO users VALUES (NULL, '$first_name', '$last_name', '$email', '$password', $phone, '$gender', '$date_of_birth', '$city', '$country')";
        $r = mysqli_query($con, $insert_query);
    

        if($r){
           
            ?>
            <script>
                window.location = 'users.php?inserted=1';
            </script>
            <?php
        
        }
        else{
            echo "error in record insertion";
        }
    }
}

?>
