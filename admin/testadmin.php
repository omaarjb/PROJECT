<?php
include("adminDb.php");

// $username = "superman";
// $password = "kliot1523";
// $hash = password_hash($password, PASSWORD_DEFAULT);
// $sql = "INSERT INTO users (user,password)

//        values('$username','$hash') ";

// try {
//     mysqli_query($connection, $sql);
//     echo "User registered !";
// } catch (mysqli_sql_exception) {
//     echo "Could not register !";
// }

$sql = "DELETE FROM admin WHERE admin_name='karim'";
mysqli_query($connection, $sql); //object

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) { //associative array
//         echo $row["ad_numb"] . "<br>";
//         echo $row["admin_name"] . "<br>";
//         echo $row["admin_pass"] . "<br>";
//     };
// } else {
//     echo "No user found !";
// }

mysqli_close($connection);
?>



<?php
