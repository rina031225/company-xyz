<?php
    session_start();
    require "connection.php";

    $item_id = $_GET['item_id'];
    $item_row = getItem($item_id);
    //$product is an associative arry

    function getItem($item_id){
        $conn = connection();

        $sql = "SELECT * FROM `items` WHERE `id` = '$item_id'";

        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die("Error in retrieving the item: $conn->error");
        }
    }


    if(isset($_POST['btn_update'])){
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];
        $id = $_GET['item_id'];

        updateItem($item_name, $item_price, $quantity, $id);
    }

    function updateItem($item_name, $item_price, $quantity, $id){
        $conn = connection();

        $sql = "UPDATE items SET `item_name` = '$item_name', `item_price` = $item_price, `quantity` = $quantity WHERE id = $id";
        var_dump($sql);

        if($conn->query($sql)){
            header("location: view-items.php");
            exit();
        } else {
            die("Error adding a new item: ".$conn->error);
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
    <title>Update </title>

</head>
<body>
    <?php
        include("main-nav.php");
    ?>
    <main class="card w-25 my-5 mx-auto">
        <div class="card-header bg-info text-white">
            <h2 class="fw-light mb-3">Edit Item Details</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <label for="item_name" class="form-label fw-bold">Item Name</label>
                <input type="text" name="item_name" id="item_name" class="form-control mb-2" value="<?= $item_row['item_name']?>" required/>

                <label for="item_price" class="form-label fw-bold">Item Price</label>
                <div class="input-group mb-2">
                    <div class="input-group-text">$</div>
                    <input type="number" name="item_price" id="item_price" class="form-control" value="<?= $item_row['item_price']?>" required>
                </div>

                <label for="quantity" class="form-label fw-bold">Quantity</label>
                <input type="numbar" name="quantity" id="quantity" class="form-control mb-2" value="<?= $item_row['quantity']?>" required>

                <div class="row">
                    <div class="col">
                        <a href="view-items.php" class="btn btn-outline-secondary w-100">Cancel</a>
                    </div>
                    <div class="col">
                        <button type="submit" name="btn_update" class="btn btn-info fw-bold px-5 w-100 text-white">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>