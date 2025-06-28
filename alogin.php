<?php
session_start();
include("config.php");

if (isset($_SESSION['loggin_user'])) {
    header("Location: ahome.php");
    exit();
}

$error_msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = trim($_POST['username']);
    $user_pass = trim($_POST['userpass']);

    $qry = mysqli_query($con, "SELECT ad_id, ad_pass FROM admin WHERE ad_username = '$user_pass'");

	if (!$qry) {
        $error_msg = "Query Failed: " . mysqli_error($con);
    } else {
        $count = mysqli_num_rows($qry);
        if ($count == 1) {
            $_SESSION['login_user'] = $user_name;
            echo "<script>alert('Login Successful!'); window.location.href='ahome.php';</script>";
            exit();
        } else {
            $error_msg = "Username or Password is Invalid!";
        }
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - TPO Portal</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: pink;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 500px;
            color: black;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
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
        }

        .btn:hover {
            background: #ff9800;
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.8);
        }

        .error-msg {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Training and Placement Office Portal</h1>
        <h3>Admin Login</h3>

        <form action="" method="POST">
            <input type="text" name="username" class="input-field" placeholder="Enter Username" required>
            <input type="password" name="userpass" class="input-field" placeholder="Enter Password" required>
            <button type="submit" class="btn">LOGIN</button>
        </form>

        <?php if (!empty($error_msg)) { ?>
            <p class="error-msg"><?php echo $error_msg; ?></p>
        <?php } ?>
    </div>
</body>
</html>
