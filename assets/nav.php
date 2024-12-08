<nav class="navbar navbar-expand-md text-dark shadow">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand text-dark" href="index.php">
            <span style="font-weight: bold; font-family: 'Roboto', sans-serif; font-size:30px; color: #333333;">Vinylize</span>
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                session_start();
                if (!isset($_SESSION['user_id'])): ?> <!-- User not logged in -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="login.php"><i class="bi bi-person-fill"></i> Log In</a>
                </li>
                <?php else: ?> <!-- User is logged in -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="logout.php">Logout</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
    <a class="nav-link text-dark" href="design-station.php"><i class="fas fa-plus"></i></a>
</li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="saved-vinyls.php"><i class="fas fa-save"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
