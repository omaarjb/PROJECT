<?php
function loggedIN()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        header("location: adminLogin.php");
    }
}
