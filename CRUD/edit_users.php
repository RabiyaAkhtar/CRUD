<?php

include("dbcon.php");

if(isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];

    $info = $con->prepare('SELECT * FROM users WHERE user_id = ?');
    $info->bind_param('i', $id);
    $info->execute();
    $result = $info->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } 
    else {
        echo "No user found with the given ID.";
        exit;
    }
    $info->close();
} else {
    echo "Invalid user ID.";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 50%;
            background-color: lightgray;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px #000;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* .radio-group {
            display: flex;
            justify-content: space-around;
            margin-bottom: 50px;
        } */

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
            margin-top: 10px;
        }

        .button:hover {
            background-color: #218838;
        }

    </style>

    <title>Edit User</title>

</head>

<body>

<body>

<div class="container">
    <h1>Update user data:</h1>
    <form action="update_user.php" method="post">

        <input type="hidden" name="id" value="<?php echo $user['user_id']; ?>">

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="m" <?php if ($user['gender'] == 'm') echo 'selected'; ?>>Male</option>
            <option value="f" <?php if ($user['gender'] == 'f') echo 'selected'; ?>>Female</option>
            <option value="o" <?php if ($user['gender'] == 'o') echo 'selected'; ?>>Other</option>
        </select>

        <br>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo htmlspecialchars($user['date_of_birth']); ?>" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>" required>

        <button type="submit" class="button">Update</button>
        
    </form>
</div>

</body>

</html>
