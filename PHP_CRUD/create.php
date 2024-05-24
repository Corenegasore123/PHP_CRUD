<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "myshop";

$db_conn = new mysqli($servername, $username, $password, $db);


    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do{
            if( empty($name) || empty($email) || empty($phone) || empty($address)){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "INSERT INTO clients (name, email, phone, address) " . "VALUES ('$name', '$email', '$phone', '$address')";
            $result = $db_conn->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: ". $db_conn->error;
                break;
            }

            $name = "";
            $email = "";
            $phone = "";
            $address = "";
            
            $successMessage = "Client added successfully";
        }while (false);

        header("location: index.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role = 'alert'>
                <strong>$errorMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
            </div>
            ";
        }

        ?>
        <form method="post">
            <div class="row mb-3">
                <label class = "col sm-3 col-form-label">Name:</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class = "form-control" value = "<?php echo $name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class = "col sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class = "form-control" value = "<?php echo $email ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class = "col sm-3 col-form-label">Phone:</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" class = "form-control" value = "<?php echo $phone ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class = "col sm-3 col-form-label">Address:</label>
                <div class="col-sm-6">
                    <input type="text" name="address" class = "form-control" value = "<?php echo $address ?>">
                </div>
            </div>


            <?php
            if(!empty($successMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role = 'alert'>
                    <strong>$successMessage</strong>
                    <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-primary">Submit</button>
                </div>
                <div>
                    <a class = "btn btn-outline-primary" href="index.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>