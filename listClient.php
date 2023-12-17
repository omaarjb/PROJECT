<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("links.php") ?>
    <title>Clients</title>
</head>

<body>
    <div class="bg-secondary container-fluid">
        <h2 class="p-4 text-white">LIST OF USERS FROM DATABASE</h2>
    </div>
    <div class="container my-5">

        <br>
        <br>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "connection.php";
                $connection = new Connection();
                $connection->selectDatabase("myhotel");
                include "client.php";
                $clients = Client::selectAllClients("users_info", $connection->conn);

                foreach ($clients as $row) {
                    echo " <tr>
             <td>$row[id]</td>
             <td>$row[name]</td>
             <td>$row[email]</td>
             <td>$row[phonenum]</td>
             <td>
             <a class ='btn btn-success btn-sm' href='update.php?id=$row[id]'>edit</a>
             <a class ='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>delete</a>
             </td>
         </tr>";
                }


                ?>
            </tbody>

        </table>
    </div>

    <? require("scriptLinks.php") ?>
</body>

</html>