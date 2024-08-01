<?php
    session_start();
    require "connection.php";

    if(isset($_POST['btn_add'])){
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];

        addItem($item_name, $item_price, $quantity);
    }

    function addItem($item_name, $item_price, $quantity){
        //establish the connection
        $conn = connection();

        //SQL query
        $sql = "INSERT INTO items (`item_name`, `item_price`, `quantity`) VALUES ('$item_name', '$item_price', '$quantity')";

        //Executio of the SQL statement
        if($conn->query($sql)){
            //If the execution of the SQL statement is successful
            header("location: view-items.php");
            //refresh the current page after 0 seconds
        } else {
            //If the connection fails
            die("Error adding a new item: ".$conn->error);
            //$conn->error is a generic error string holder
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>New Item</title>

</head>
<body>
<?php
        include "main-nav.php";
    ?>
    <div class="container mt-5 w-25">
        <div class="card">
            <div class="card-header bg-info">
                <h2 class="text-white">Add New Item</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="item_name" class="form-label fw-bold">Item Name</label>
                        <input type="text" name="item_name" id="item_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="item_price" class="form-label fw-bold">Item Price</label>
                        <div class="input-group">
                            <div class="input-group-text">$</div>
                            <input type="number" name="item_price" id="item_price" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="quantity" class="form-label fw-bold">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <a href="view-items.php" class="btn btn-outline-secondary w-100">Cancel</a>
                        </div>
                        <div class="col">
                            <button type="submit" name="btn_add" class="btn btn-info text-white w-100">Add</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>