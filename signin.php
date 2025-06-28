<?php
include("config.php");

$error = ""; // Variable to hold error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = password_hash($_POST['pass'], PASSWORD_BCRYPT); // Secure password hashing

    $qry = mysqli_query($con, "INSERT INTO tpo_portal.account (a_username, a_pass) VALUES ('$username', '$password')");

    if ($qry) {
        echo "<script>alert('Sign-Up Successful! Redirecting to Login...'); window.location.href='login.php';</script>";
        exit();
    } else {
        $error = "Sign-Up Failed: " . mysqli_error($con);
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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

        .signup-container {
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
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
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
            font-weight: 600;
            margin-top: 10px;
        }

        .btn:hover {
            background: #ff9800;
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.8);
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
    <div class="signup-container">
        <form id="signin" action="" method="POST">
            <h1>Training and Placement Office Portal</h1>
            <h2>Sign Up</h2>
            <input type="text" name="username" id="username" placeholder="Enter Username" required>
            <input type="password" name="pass" id="pass" placeholder="Enter Password" required>
            <button type="submit" class="btn">SIGN UP</button>
            <div class="links">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
