<?php require("adminDb.php") ?>

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
            <div class="text-center"> <button type="submit" class="btn btn-success " name="adminLogin">Login</button></div>

        </form>
    </div>

    <?php require("scriptLinks.php") ?>
</body>

</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fltrForm = filtration($_POST);
    // $passHash = password_hash($adminPass, PASSWORD_DEFAULT);
    // echo "$fltrForm[adminName] <br>";
    // echo "$fltrForm[adminPassword] <br>";

    $sql = "SELECT * FROM 'admin' WHERE 'admin_Name'=? AND 'admin_Pass'=?";
    $values = [$fltrForm['adminName'], $fltrForm['adminPassword']];

    // select($sql, $values, "ss");
    // mysqli_connect($connection,$sql);
}
// mysqli_close($connection);
?>