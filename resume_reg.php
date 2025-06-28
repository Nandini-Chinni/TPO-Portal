<?php
include("config.php"); // Ensure $conn is included

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    global $conn;

    // Fetch form data safely
    $a = $_POST['first_name'] ;
    $b = $_POST['middle_name'] ;
    $c = $_POST['last_name'] ;
    $d = $_POST['dob'] ;
    $e = $_POST['gender'] ;
    $f = $_POST['cont'] ;
    $g = $_POST['email'] ;
    $h = $_POST['addr'] ;
    $i = $_POST['degree'] ;
    $op = $_POST['dep'];
    $j = $_POST['clg'] ;
    $k = $_POST['univ'] ;
    $l = $_POST['cgpa'] ;
    $m = $_POST['hsc'];
    $n = $_POST['s_clg'];
    $o = $_POST['per'] ;
    $p = $_POST['soft1'] ;
    $q = $_POST['soft2'] ;
    $r = $_POST['soft3'] ;
    $s = $_POST['soft4'] ;
    $t = $_POST['soft5'] ;
    $u = $_POST['tech1'] ;
    $v = $_POST['tech2'] ;
    $w = $_POST['tech3'] ;
    $x = $_POST['tech4'] ;
    $y = $_POST['tech5'] ;
    $z = $_POST['p_name1'] ;
    $ab = $_POST['prj1'] ;
    $cd = $_POST['p_name2'] ;
    $ef = $_POST['prj2'] ;
    $gh = $_POST['achv1'] ;
    $ij = $_POST['achv2'] ;
    $kl = $_POST['achv3'] ;
    $mn = $_POST['achv4'] ;
    $yz = $_POST['p_status'] ;

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO student (
        s_first_name, s_middle_name, s_last_name, s_dob, s_gender, s_cont, s_email, 
        s_addr, s_degree, s_dep, s_dclg, s_univ, s_cgpa, s_hsc, s_hclg, s_per, 
        s_soft1, s_soft2, s_soft3, s_soft4, s_soft5, s_tech1, s_tech2, s_tech3, 
        s_tech4, s_tech5, s_pname1, s_prj1, s_pname2, s_prj2, s_achv1, s_achv2, 
        s_achv3, s_achv4, p_status
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    // Bind the parameters (all are strings, so "sssssssssssssssssssssssssssssssssss")
    $stmt->bind_param(
        "sssssssssssssssssssssssssssssssssss", 
        $a, $b, $c, $d, $e, $f, $g, $h, $i, $op, $j, $k, $l, $m, $n, $o, 
        $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $z, $ab, $cd, $ef, $gh, $ij, $kl, $mn, $yz
    );

    // Execute and check for errors
    if ($stmt->execute()) {
        header("Location: home.php");
        exit();
    } else {
        echo "<center>Failed to Add Resume: " . $stmt->error . "</center>";
    }

    $stmt->close();
} else {
    echo "<center>Request method is not POST</center>";
}

$conn->close(); // Close the database connection
?>
