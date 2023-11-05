<?php require("adminDb.php");
session_start();
if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) {
    header("location: dashboard.php");
}
// ila kanti f dashboard maymkn nrje3 l login hta ndir log out
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("links.php") ?>
    <title>Admin Login</title>
</head>

<body>
    <div class="log-formAD shadow">
        <form method="post">
            <h3 class="text-center mb-4">Admin Login</h3>
            <div class="mb-3">
                <input type="text" name="adminName" class="form-control shadow-none" placeholder="Admin Name" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control shadow-none" name="adminPassword" placeholder="Admin Password" required>
            </div>
            <div class="text-center"> <button type="submit" class="btn btn-success " name="login">Login</button></div>

        </form>
    </div>

    <?php require("scriptLinks.php") ?>
</body>

</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fltrForm = filtration($_POST);
    $sql = "SELECT * FROM admin WHERE admin_Name=? AND admin_Pass=?";
    $values = [$fltrForm['adminName'], $fltrForm['adminPassword']];

    $res = select($sql, "ss", $values);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['ad_numb'];
        header("location: dashboard.php");
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Login Failed !</strong> Check your Username and Password .
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}
?>