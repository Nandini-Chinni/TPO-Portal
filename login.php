<?php
session_start();
include("config.php"); // Ensure this file correctly sets up $con

if (isset($_SESSION['login_user'])) {
    header("location: home.php");
    exit();
}

$error = ""; // Variable to hold error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = mysqli_real_escape_string($con, $_POST['name']);
    $user_pass = md5($_POST['pass']); // Hashing for security

    // Execute the query
    $qry = mysqli_query($con, "SELECT p_id FROM event_sphere.participant_details WHERE (p_name='$user_name' OR p_email='$user_name') AND p_pass='$user_pass'");

    if (!$qry) {
        $error = "Query Failed: " . mysqli_error($con);
    } else {
        $count = mysqli_num_rows($qry);
        if ($count == 1) {
            $_SESSION['login_user'] = $user_name;
            echo "<script>alert('Login Successful!'); window.location.href='home.php';</script>";
            exit();
        } else {
            $error = "Username or Password is Invalid!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 600px;
            color: white;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            outline: none;
            border-radius: 25px;
            font-size: 16px;
            color: black;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
            transition: 0.3s;
        }

        input:focus {
            background: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #ff7b00;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
            margin-top: 10px;
        }

        .btn:hover {
            background: #ff9800;
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.8);
        }

        .forgot {
            display: block;
            margin: 10px 0;
            color: white;
            font-size: 14px;
            text-decoration: none;
            transition: 0.3s;
        }

        .forgot:hover {
            color: #ff9800;
            text-decoration: underline;
        }

        .links {
            margin-top: 15px;
        }

        .links a {
            text-decoration: none;
            color: white;
            font-weight: 400;
            transition: 0.3s;
        }

        .links a:hover {
            text-decoration: underline;
            color: #ff9800;
        }
    </style>

    <script>
        // Show alert if error exists
        window.onload = function() {
            <?php if (!empty($error)) { ?>
                alert("<?php echo $error; ?>");
            <?php } ?>
        };
    </script>
</head>
<body>
    <div class="login-container">
        <form id="login" action="" method="POST">
		<h1>Training and Placement Office Portal</h1>
		<h2>Login</h2>
            <input type="text" name="name" id="name" placeholder="Enter Name or E-mail" required>
            <input type="password" name="pass" id="pass" placeholder="Enter Password" required>
            <a href="forgot.php" class="forgot">Forgot Password?</a>
            <button type="submit" class="btn">LOGIN</button>
            <div class="links">
                <a href="signin.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>
