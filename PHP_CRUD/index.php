<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>List Of Clients</h2>
        <a href="create.php" class="btn btn-primary" role = "button">New Client</a>
        <br>
        <table class = "table table-striped my-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $db = "myshop";

                    $db_conn = new mysqli($servername, $username, $password, $db);

                    if($db_conn->connect_error){
                        die("Connection failed: " . $db_conn->connect_error);
                    }

                    $sql = "SELECT * FROM clients" ;
                    $result = $db_conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $db_conn->connect_error);
                    }

                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class = 'btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                            <a class = 'btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>