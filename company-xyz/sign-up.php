<?php
require "connection.php";

function addUser($username, $password){
    $conn = connection();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`username`, `password`)
            VALUES ('$username', '$password')";
    
    if ($conn->query($sql)){
        header("location: sign-in.php");
        exit;
    }else{
        die("Error adding new user: " . $conn->error);
    }
}
if(isset($_POST['btn_sign_up'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password){
        addUser($username, $password);
    }else{
        echo "<p class='text-danger'>Password and Confirm Password do not match.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Sign Up</title>
</head>

<body class="bg-light">
   <div class="vh-100">
      <div class="row h-100 m-0">
         <div class="card w-25 mx-auto my-auto p-0">
            <div class="card-header text-info">
               <h1 class="card-title h3 mb-0">Create your account</h1>
            </div>
            <div class="card-body">
               <form method="post">
                  
                  <label for="username" class="form-label small font-weight-bold">Username</label>
                  <input type="text" name="username" id="username" class="form-control mb-2 fw-bold" maxlength="15" required>

                  <label for="password" class="form-label small">Password</label>
                  <input type="password" name="password" id="password" class="form-control mb-2" required>

                  <label for="confirm-password" class="form-label small">Confirm Password</label>
                  <input type="password" name="confirm_password" id="confirm-password" class="form-control mb-5">

                  <button type="submit" class="btn btn-info w-100  text-white" name="btn_sign_up">Sign up</button>
               </form>

               <div class="text-center mt-3">
                  <p class="small">Already have an account? <a href="sign-in.php">Log in</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>