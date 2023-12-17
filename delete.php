 <?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        include 'connection.php';
        $connection = new Connection();
        $connection->selectDatabase("myhotel");
        include "client.php";
        Client::deleteClient("users_info", $connection->conn, $id);
        $successMessage = Client::$successMsg;
        $erroMessage = Client::$errorMsg;
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require("links.php") ?>
     <title>Deleted</title>
 </head>

 <body>
     <div class="container my-5 ">

         <h2>Delete</h2>
         <?php

            if (!empty($successMessage)) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$successMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        </button>
        </div>";
            } else if (!empty($erroMessage)) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>$erroMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        </button>
        </div>";
            }

            echo "<a class ='btn btn-success btn-sm' href='listClient.php'>Go back</a>";

            ?>


     </div>
     <?php require("scriptLinks.php") ?>
 </body>

 </html>