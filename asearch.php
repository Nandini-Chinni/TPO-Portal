<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $degree = $_POST['degree'];
    $dep = $_POST['dep'];
    $cgpa = $_POST['cgpa'];

    // Use Prepared Statements for Security
    $qry = $con->prepare("SELECT * FROM student WHERE s_degree LIKE ? OR s_dep LIKE ? OR s_cgpa > ?");
    $search_degree = "%$degree%";
    $search_dep = "%$dep%";
    $qry->bind_param("ssd", $search_degree, $search_dep, $cgpa);
    $qry->execute();
    $result = $qry->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Students - TPO Portal</title>

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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 80%;
            max-width: 600px;
            color: black;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .input-field, .select-field {
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
            display: block;
            text-align: center;
            margin: 10px 0;
        }

        .btn:hover {
            background: #ff9800;
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.8);
        }

        /* Table Styling (Now Outside of Container) */
        .table-container {
            width: 100%;
            max-width: 1500px;
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #ff7b00;
            color: white;
        }

        .edit-btn {
            background: #4CAF50;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Training and Placement Office Portal</h1>
        <a href="ahome.php" class="btn">Back</a>

        <h3>Browse the Data</h3>

        <form action="" method="POST">
            <select name="degree" class="select-field">
                <option value="BTech">BTech</option>
                <option value="MTech">MTech</option>
                <option value="BBA">BBA</option>
                <option value="MBA">MBA</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                <option value="other">Other</option>
            </select>

            <select name="dep" class="select-field">
                <option value="CS">CS</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="ENTC">ENTC</option>
                <option value="MECH">MECH</option>
                <option value="CIVIL">CIVIL</option>
                <option value="other">Other</option>
            </select>

            <input type="text" name="cgpa" class="input-field" placeholder="CGPA">

            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    <!-- Table Outside the Container -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Degree</th>
                    <th>Department</th>
                    <th>College</th>
                    <th>CGPA</th>
                    <th>Soft Skills</th>
                    <th>Tech Skills</th>
                    <th>Placement Status</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['s_id']; ?></td>
                        <td><?php echo $row['s_first_name'] . " " . $row['s_middle_name'] . " " . $row['s_last_name']; ?></td>
                        <td><?php echo $row['s_dob']; ?></td>
                        <td><?php echo $row['s_gender']; ?></td>
                        <td><?php echo $row['s_cont']; ?></td>
                        <td><?php echo $row['s_email']; ?></td>
                        <td><?php echo $row['s_addr']; ?></td>
                        <td><?php echo $row['s_degree']; ?></td>
                        <td><?php echo $row['s_dep']; ?></td>
                        <td><?php echo $row['s_dclg']; ?></td>
                        <td><?php echo $row['s_cgpa']; ?></td>
                        <td><?php echo implode(", ", array_filter([$row['s_soft1'], $row['s_soft2'], $row['s_soft3'], $row['s_soft4'], $row['s_soft5']])); ?></td>
                        <td><?php echo implode(", ", array_filter([$row['s_tech1'], $row['s_tech2'], $row['s_tech3'], $row['s_tech4'], $row['s_tech5']])); ?></td>
                        <td><?php echo $row['p_status']; ?></td>
                        <td><a href="update.php?edit=<?php echo $row['s_id']; ?>" class="edit-btn">Edit</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
</body>
</html>
