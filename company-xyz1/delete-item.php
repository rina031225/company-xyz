<?php
session_start();

require "connection.php";

$item_id = $_GET['item_id'];

$item_row = getItem($item_id);

function getItem($item_id){
    $conn = connection();
    $sql = "SELECT * FROM `items` WHERE `id` = '$item_id'";

    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        die("Error retrieving the item: " . $conn->error);
    }
}
function deleteItem($id){
    $conn = connection();
    $sql = "DELETE FROM `items` WHERE `id` = '$id'";

    if($conn->query($sql)){
        header("location: view-items.php");
        exit;
    }else{
        die("Error deleting the item: " . $conn->error);
    }
    
}
if(isset($_POST['btn_delete'])){
    $id = $_GET['item_id'];
    
    deleteItem($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include "main-nav.php";
    ?>
    <main class="card w-25 mx-auto border-0 my-5">
        <div class="card-header bg-white border-0">
            <h2 class="card-title text-center text-danger h4 mb-0">Delete Item</h2>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="fa-solid fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                <p class="fw-bold mb-0">Are you sure you want to delete "<?= $item_row['item_name'] ?>"?</p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="view-items.php" class="btn btn-secondary w-100">Cancel</a>
                </div>
                <div class="col">
                    <form method="post">
                        <button type="submit" class="btn btn-outline-danger w-100" name="btn_delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>