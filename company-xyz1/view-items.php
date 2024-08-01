<?php
    session_start();
    require "connection.php";

    function getAllItems(){
        $conn = connection();

        $sql = "SELECT * FROM `items`";

        // var_dump($sql);
        if($result = $conn->query($sql)){
            return $result;
        } else {
            die("Error in retrieving all items".$conn->error);
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
    <title>Items</title>

</head>
<body>
    <?php
        include "main-nav.php";
    ?>

    <div class="container mt-5">
        <div>
            <h2 class="fw-light">Item List</h2>
        </div>
        <table class="table bordered mt-4 table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $item_result = getAllItems();
                    while($item_row = $item_result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?= $item_row['id']?></td>
                        <td><?= $item_row['item_name']?></td>
                        <td>$<?= $item_row['item_price']?></td>
                        <td><?= $item_row['quantity']?></td>
                        <td>
                            <a href="edit-item.php?item_id=<?= $item_row['id'] ?>" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-pencil"></i></a>
                            <a href="delete-item.php?item_id=<?= $item_row['id'] ?>" class="btn btn-outline-danger btn-sm ms-2"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <!-- <div class="text-end">
            <form action="" method="POST">
                <a href="add-item.php" class="btn btn-info text-white"><i class="fa-solid fa-circle-plus"></i> Add New Item</a>
            </form>
        </div> -->
        <a href="add-item.php" class="btn btn-info float-end text-white"><i class="fa-solid fa-plus-circle"></i> Add New Item</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>