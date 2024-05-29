<html>
    <style>
        .button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        margin-top: 30px;
        margin-left: 670px;
        }

        .button:hover {
            background-color: #218838;
        }

        .success-message,
        .error-message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            margin-top: 30px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            text-align: center;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</html>


<?php
// Include your database connection file
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['date_of_birth'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    // Sanitize and validate other fields as needed

    // Prepare the UPDATE statement
    $update = $con->prepare('UPDATE users SET email = ? , phone = ?, gender = ?, date_of_birth = ?, city = ?, country = ? WHERE user_id = ?');
    $update->bind_param('ssssssi', $email, $phone, $gender, $dob, $city, $country, $id);

    // Execute the statement
    if ($update->execute()) {
        echo '<div class="success-message">User data updated successfully.</div>';
        // Redirect to a confirmation page or back to the user list
        // header('Location: users.php?updated=1');
        
        ?>
        <br>
        <a href="users.php" class="button">View Updated Info</a>
        <!-- <script> -->
                <!-- window.location = 'users.php?deleted=1'; -->
        <!-- </script> -->
        <?php
        exit();
        
    } 
    else {
        echo '<div class="error-message">Error updating user data.</div>';
    }

    // Close the statement
    $update->close();
}
?>
