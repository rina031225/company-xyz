<?php
session_start();

require "connection.php";

function getAllItems(){
    $conn = connection();
    $sql = "SELECT * FROM `items`";
    
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        die("Error in retrieving the items: ".$conn->error);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Items</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include "main-nav.php";
    ?>
    <main class="container py-5">
        <h2 class="h3 text-muted">Item List</h2>
        <table class="table table-hover mt-4">
            <thead class="table-light">
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
                // or use foreach depend on the teacher discussed 
                // foreach($item_result as $item_row){
                while($item_row = $item_result->fetch_assoc()){ 
                ?>
                <tr>
                    <td><?= $item_row['id'] ?></td>
                    <td><?= $item_row['item_name'] ?></td>
                    <td>$<?= $item_row['item_price'] ?></td>
                    <td><?= $item_row['quantity'] ?></td>
                    <td>
                        <a href="edit-item.php?item_id=<?= $item_row['id'] ?>" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-pencil-alt"></i></a>
                        <a href="delete-item.php?item_id=<?= $item_row['id'] ?>" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="add-item.php" class="btn btn-info float-end text-white"><i class="fa-solid fa-plus-circle"></i> Add New Item</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>