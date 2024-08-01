<nav class="navbar navbar-expand-sm navbar-dark bg-info px-4">
    <a href="view-items.php" class="navbar-brand">
        <h1 class="h4 text-uppercase">Company XYZ</h1>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#main-nav">
        <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="main-nav">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="view-items.php" class="nav-link">Items</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="" class="nav-link fw-bold"><?= $_SESSION['username'] ?></a></li>
            <li class="nav-item"><a href="sign-in.php" class="nav-link">Log out</a></li>
        </ul>
    </div>
</nav>