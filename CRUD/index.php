<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightsteelblue;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: lightslategray;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        table td {
            padding: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="number"] {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
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
        }
        
    </style>
</head>
<body>

<?php
if (isset($_GET['inserted']) && $_GET['inserted'] == 2) {
    echo "<p style='color: red; text-align: center;'>Email already exists in the database.</p>";
} 

if (isset($_GET['inserted']) && $_GET['inserted'] != 2){
     echo "<p style='color: green; text-align: center;'>Record inserted successfully.</p>";
}

?>



<h1>Enter the record here:</h1>


<form action="insert.php" method="post">

<table>
    <tr>
        <td>Enter first name:</td>
        <td><input type="text" name="first_name"></td>
    </tr>
    <tr>
        <td>Enter last name:</td>
        <td><input type="text" name="last_name"></td>
    </tr>
    <tr>
        <td>Enter email:</td>
        <td><input type="email" name="email"></td>
    </tr>
    <tr>
        <td>Enter password:</td>
        <td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td>Enter date of birth:</td>
        <td><input type="date" name="date_of_birth"></td>
    </tr>
    <tr>
        <td>Enter phone:</td>
        <td><input type="number" name="phone"></td>
    </tr>
    <tr>
        <td>Enter gender:</td>
        <td><input type="radio" value="m" name="gender">Male</td>
        <td><input type="radio" value="f" name="gender">Female</td>
        <td><input type="radio" value="o" name="gender">Other</td>
    </tr>
    <tr>
        <td>Enter city:</td>
        <td><input type="text" name="city"></td>
    </tr>
    <tr>
        <td>Enter country:</td>
        <td><input type="text" name="country"></td>
    </tr>

    <tr>
        <td><input type="submit" value="Save"></td>
    </tr>
</table>
</form>

<form action="users.php" method="get">
    <button type="submit">Show all users</button>
</form>

<br>

</body>
</html>
