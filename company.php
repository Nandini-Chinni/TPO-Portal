<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration - TPO Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            background: white;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3, h4 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Training and Placement Office Portal</h1>
        <h2>Company Registration</h2>
        <form action="" method="POST">
            <h3>Company Details</h3>
            <label>Company Name:</label>
            <input type="text" name="c_name" placeholder="Enter Company Name">
            
            <label>Owner:</label>
            <input type="text" name="owner" placeholder="Enter Owner Name">
            
            <label>CEO:</label>
            <input type="text" name="ceo" placeholder="Enter CEO Name">
            
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter Email">
            
            <label>Contact:</label>
            <input type="text" name="cont" placeholder="Enter Contact No.">
            
            <label>Address:</label>
            <textarea name="addr" rows="3" placeholder="Enter Address"></textarea>
            
            <h3>HR Details</h3>
            <label>HR Name:</label>
            <input type="text" name="h_name" placeholder="Enter HR Name">
            
            <label>Email:</label>
            <input type="email" name="h_email" placeholder="Enter HR Email">
            
            <label>Contact:</label>
            <input type="text" name="h_cont" placeholder="Enter HR Contact No.">
            
            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>

<?php
include("config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = $_POST['c_name'];
    $b = $_POST['owner'];
    $c = $_POST['ceo'];
    $d = $_POST['email'];
    $e = $_POST['cont'];
    $f = $_POST['addr'];
    $g = $_POST['h_name'];
    $h = $_POST['h_email'];
    $i = $_POST['h_cont'];

    $qry = "INSERT INTO tpo_portal.company (c_name, c_owner, c_ceo, c_email, c_cont, c_addr, h_name, h_email, h_cont) 
            VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i')";
    
    if (mysqli_query($con, $qry)) {
        header("Location: clogin.php");
        exit();
    } else {
        echo "<center>Registration Failed: " . mysqli_error($con) . "</center>";
    }
}
?>
