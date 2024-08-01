<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <a href="" class="navbar-brand ms-3">
            <h1 class="h3 mb-0 text-uppercase">Company XYZ</h1>
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="ms-3 collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="view-items.php" class="nav-link">Items</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a href="" class="nav-link"><?= $_SESSION['username'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="sign-out.php" class="nav-link me-5">Log out</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="sign-in.php" class="nav-link me-5">Sign In</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>