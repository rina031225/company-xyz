<?php
require "connection.php";

function login($username, $password){
    $conn = connection();
    $sql = "SELECT * FROM `users`  WHERE `username` = '$username'";

    if($result = $conn->query($sql)){
        if($result->num_rows == 1) {
            $user_row = $result->fetch_assoc();
            if(password_verify($password, $user_row['password'])){
                session_start();

                $_SESSION['user_id'] = $user_row['id'];
                $_SESSION['username'] = $user_row['username'];

                header("location: add-item.php");
                exit;
            }else{
                echo "<p class='text-danger'>Incorrect Password.</p>";
            }
        }else{
            echo "<p class='text-danger'>Username not found.</p>";
        }
    }else{
        die("Error with the query: " . $conn->error);
    }
}
if(isset($_POST['btn_log_in'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="Description" content="Enter your description here" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Login</title>
</head>

<body class="bg-light">
   <div  class="vh-100">
      <div class="row h-100 m-0">
         <div class="card w-25 my-auto mx-auto px-0">
            <div class="card-header text-info bg-white">
               <h1 class="card-title text-center mb-0">Company XYZ</h1>
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <label for="username" class="form-label small">Username</label>
                  <input type="text" name="username" id="username" class="form-control mb-2" autofocus required>

                  <label for="password" class="form-label small">Password</label>
                  <input type="password" name="password" id="password" class="form-control mb-5">

                  <button type="submit" name="btn_log_in" class="btn btn-info w-100 text-white">Log in</button>
               </form>

               <div class="text-center mt-3">
                  <a href="sign-up.php" class="small">Create Account</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>