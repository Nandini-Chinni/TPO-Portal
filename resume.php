<?php
include "lock.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Registration - TPO Portal</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            background: white;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: #f9f9f9;
        }

        legend {
            font-weight: bold;
            padding: 5px 10px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select, textarea {
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

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-group input {
            width: auto;
            margin-right: 5px;
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
    <h2>Resume Registration</h2>

    <form id="reg" action="resume_reg.php" method="POST">
        
        <fieldset>
            <legend>Profile</legend>
            <label>Name:</label>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="middle_name" placeholder="Middle Name">
            <input type="text" name="last_name" placeholder="Last Name" required>

            <label>DOB:</label>
            <input type="date" name="dob" required>

            <label>Gender:</label>
            <div class="radio-group">
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>

            <label>Contact:</label>
            <input type="text" name="cont" placeholder="Enter Contact No." required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter Email ID" required>

            <label>Address:</label>
            <textarea name="addr" placeholder="Enter Address" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Education</legend>
            <label>Degree:</label>
            <select name="degree">
                <option value="BTech">BTech</option>
                <option value="MTech">MTech</option>
                <option value="BBA">BBA</option>
                <option value="MBA">MBA</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                <option value="Other">Other</option>
            </select>

            <label>Department:</label>
            <select name="dep">
                <option value="CS">CS</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
                <option value="CIVIL">CIVIL</option>
                <option value="Other">Other</option>
            </select>

            <label>College:</label>
            <input type="text" name="clg" placeholder="Enter College Name" required>

            <label>University:</label>
            <input type="text" name="univ" placeholder="Enter University Name">

            <label>CGPA:</label>
            <input type="text" name="cgpa" placeholder="CGPA">
        </fieldset>

        <fieldset>
            <legend>Skills</legend>
            <label>Soft Skills:</label>
            <input type="text" name="soft1" placeholder="Soft Skill 1">
            <input type="text" name="soft2" placeholder="Soft Skill 2">
            <input type="text" name="soft3" placeholder="Soft Skill 3">
            <input type="text" name="soft4" placeholder="Soft Skill 4">
            <input type="text" name="soft5" placeholder="Soft Skill 5">

            <label>Tech Skills:</label>
            <input type="text" name="tech1" placeholder="Tech Skill 1">
            <input type="text" name="tech2" placeholder="Tech Skill 2">
            <input type="text" name="tech3" placeholder="Tech Skill 3">
            <input type="text" name="tech4" placeholder="Tech Skill 4">
            <input type="text" name="tech5" placeholder="Tech Skill 5">
        </fieldset>

        <fieldset>
            <legend>Projects</legend>
            <label>Project 1:</label>
            <input type="text" name="p_name1" placeholder="Project Name">
            <textarea name="prj1" placeholder="Describe Project 1"></textarea>

            <label>Project 2:</label>
            <input type="text" name="p_name2" placeholder="Project Name">
            <textarea name="prj2" placeholder="Describe Project 2"></textarea>
        </fieldset>

        <fieldset>
            <legend>Achievements</legend>
            <input type="text" name="achv1" placeholder="Achievement 1">
            <input type="text" name="achv2" placeholder="Achievement 2">
            <input type="text" name="achv3" placeholder="Achievement 3">
            <input type="text" name="achv4" placeholder="Achievement 4">
        </fieldset>

        <fieldset>
            <legend>Placement Status</legend>
            <div class="radio-group">
                <input type="radio" name="p_status" value="NOT PLACED"> NOT PLACED
                <input type="radio" name="p_status" value="PLACED"> PLACED
            </div>
        </fieldset>

        <button type="submit">SUBMIT</button>
    </form>
</div>

</body>
</html>
