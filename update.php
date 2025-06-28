<?php
include("config.php");

$get = isset($_GET['edit']) ? $_GET['edit'] : null;

if ($get && isset($_POST['submit'])) {
    $stmt = $con->prepare("UPDATE tpo_portal.student SET s_first_name=?, s_middle_name=?, s_last_name=?, s_dob=?, s_gender=?, s_cont=?, s_email=?, s_addr=?, s_degree=?, s_dep=?, s_dclg=?, s_univ=?, s_cgpa=?, s_hsc=?, s_hclg=?, s_per=?, s_soft1=?, s_soft2=?, s_soft3=?, s_soft4=?, s_soft5=?, s_tech1=?, s_tech2=?, s_tech3=?, s_tech4=?, s_tech5=?, s_pname1=?, s_prj1=?, s_pname2=?, s_prj2=?, s_achv1=?, s_achv2=?, s_achv3=?, s_achv4=?, p_status=? WHERE s_id=?");
    
    $params = [];
    $fields = ["first_name", "middle_name", "last_name", "dob", "gender", "cont", "email", "addr",
        "degree", "dep", "clg", "uni", "cgpa", "hsc", "s_clg", "per",
        "soft1", "soft2", "soft3", "soft4", "soft5", "tech1", "tech2", "tech3", "tech4", "tech5",
        "p_name1", "prj1", "p_name2", "prj2", "achv1", "achv2", "achv3", "achv4", "p_status"];
    
    foreach ($fields as $field) {
        $params[] = isset($_POST[$field]) ? $_POST[$field] : '';
    }
    
    $params[] = $get;
    $paramTypes = str_repeat("s", count($params) - 1) . "i";
    $stmt->bind_param($paramTypes, ...$params);
    
    if ($stmt->execute()) {
        echo "Updated Successfully";
		header("Location: asearch.php");
        exit();
    } else {
        echo "Not Updated: " . $stmt->error;
    }

    $stmt->close();
}

$stmt = $con->prepare("SELECT * FROM student WHERE s_id=?");
$stmt->bind_param("i", $get);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - TPO Portal</title>
    
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
    <h2>Edit Student Details</h2>

    <form id="submit" action="" method="POST">
        <fieldset>
            <legend>Profile</legend>
            <label>Name:</label>
            <input type="text" name="first_name" value="<?php echo isset($row['s_first_name']) ? htmlspecialchars($row['s_first_name']) : ''; ?>" placeholder="First Name">
            <input type="text" name="middle_name" value="<?php echo isset($row['s_middle_name']) ? htmlspecialchars($row['s_middle_name']) : ''; ?>" placeholder="Middle Name">
            <input type="text" name="last_name" value="<?php echo isset($row['s_last_name']) ? htmlspecialchars($row['s_last_name']) : ''; ?>" placeholder="Last Name">

            <label>DOB:</label>
            <input type="date" name="dob" value="<?php echo isset($row['s_dob']) ? htmlspecialchars($row['s_dob']) : ''; ?>">

            <label>Gender:</label>
            <div class="radio-group">
                <input type="radio" name="gender" value="Male" <?php echo isset($row['s_gender']) && $row['s_gender'] == "Male" ? "checked" : ""; ?>> Male
                <input type="radio" name="gender" value="Female" <?php echo isset($row['s_gender']) && $row['s_gender'] == "Female" ? "checked" : ""; ?>> Female
            </div>
        </fieldset>
        
        <fieldset>
            <legend>Placement Status</legend>
            <div class="radio-group">
                <input type="radio" name="p_status" value="NOT PLACED" <?php echo isset($row['p_status']) && $row['p_status'] == "NOT PLACED" ? "checked" : ""; ?>> NOT PLACED
                <input type="radio" name="p_status" value="PLACED" <?php echo isset($row['p_status']) && $row['p_status'] == "PLACED" ? "checked" : ""; ?>> PLACED
            </div>
        </fieldset>

        <button type="submit" name="submit">SUBMIT</button>
    </form>
</div>

</body>
</html>
