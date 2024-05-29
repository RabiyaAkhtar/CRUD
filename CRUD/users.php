<!DOCTYPE html>
<html>
<head>
    <title>Users Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightskyblue;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        a {
            display: block;
            margin-bottom: 20px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }

        td a {
            color: #007bff;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        button{
            background-color: #45a049 ;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top:10px;
            /* margin-left:700px; */
        }
    </style>
</head>

<body>

<h1>Users Data</h1>

<a href="index.php"><button type="submit">Add new user</button></a>
<p></p>

<?php
if (isset($_GET['inserted']) && $_GET['inserted'] == 1) {
    echo "<p style='color: green; text-align: center;'>Record inserted successfully</p>";
}

if (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
    echo "<p style='color: green; text-align: center;'>Record deleted successfully</p>";
}

if (isset($_GET['updated']) && $_GET['updated'] == 1) {
    echo "<p style='color: green; text-align: center;'>Record updated successfully</p>";
}
?>

<?php

include("dbcon.php");

$user_result= mysqli_query($con, "SELECT * FROM users ORDER BY user_id DESC");

if ($user_result->num_rows >0){

    ?>
    <table border="1">
        <th>S.No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Date of birth</th>
        <th>City</th>
        <th>Country</th>
        <th>Action1</th>
        <th>Action2</th>
    <?php

    $i= 1;

    while ($record = mysqli_fetch_array($user_result)) {

        if($record['gender'] == "m"){
            $gender = "Male";
        }
        else if($record['gender'] == "f"){
            $gender = "female";
        }
        else{
            $gender = "other";
        }

        
        ?>
        
            <tr>
                <td><?php echo $i++; ?></td>
        
                <td><?php echo $record['first_name']; ?></td>
                <td><?php echo $record['last_name']; ?></td>
                <td><?php echo $record['email']; ?></td>
                <td><?php echo $record['phone']; ?></td>
                <td><?php echo $gender; ?></td>
                <td>
                    <?php 
                    echo $newDate = date("d-m-Y", strtotime('date_of_birth'));
                    ?>
                </td>
                <td><?php echo $record['city']; ?></td>
                <td><?php echo $record['country']; ?></td>
                <td><a href="delete.php?id=<?php echo $record ['user_id'];?>">Delete</a></td>
                <td><a href="edit_users.php?id=<?php echo $record ['user_id'];?>">Update</a></td>

            </tr>
        
        <?php
    
    }  

    ?>

    </table>

    <?php 

}

else{
    echo "users not found";
}

?>

</body>
