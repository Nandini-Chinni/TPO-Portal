<?php
include("config.php");

$error = ""; // Variable to hold error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $new_password = password_hash($_POST['userpass'], PASSWORD_BCRYPT); // Secure password hashing

    $qry = mysqli_query($con, "UPDATE tpo_portal.account SET a_pass='$new_password' WHERE a_username='$username'");

    if ($qry) {
        echo "<script>alert('Password Changed Successfully! Redirecting to Login...'); window.location.href='login.php';</script>";
        exit();
    } else {
        $error = "Password Change Failed: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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

        .forgot-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
            color: white;
        }

        h1 {
            font-size: 28px;
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
    <div class="forgot-container">
        <form id="forgot" action="" method="POST">
            <h1>Change Password</h1>
            <input type="text" name="username" id="username" placeholder="Enter Username" required>
            <input type="password" name="userpass" id="userpass" placeholder="Enter New Password" required>
            <button type="submit" class="btn">SUBMIT</button>
            <div class="links">
                Remember your password? <a href="login.php">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
