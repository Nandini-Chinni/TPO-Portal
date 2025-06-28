<?php
include "lock.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - TPO Portal</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .index-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 400px;
            color: white;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: #ff7b00;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .btn:hover {
            background: #ff9800;
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.8);
        }
    </style>
</head>
<body>
    <div class="index-container">
        <h1>Training and Placement Office Portal</h1>
        <div class="btn-container">
            <a href="resume.php" class="btn">ADD RESUME</a>
            <a href="logout.php" class="btn">LOGOUT</a>
        </div>
    </div>
</body>
</html>
