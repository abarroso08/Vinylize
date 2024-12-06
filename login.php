<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php 
include "assets/head.php";
session_start(); // Start or resume the session

// Retrieve the URL from GET or fallback to default
$url = isset($_GET['url']) ? trim($_GET['url']) : 'index.php';
$url = filter_var($url, FILTER_SANITIZE_URL); // Sanitize the URL for safety

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the specified URL
    header("Location: $url");
    exit;
}
?>
<link rel="stylesheet" href="css/create.css">

<body>
    <?php include "assets/nav.php" ?>
    <div class="bg-img">
        <div class="content">
            <header>Login to Vinilyze!</header>
            <form action="checkLogin.php?url=<?php echo urlencode($url); ?>" method="POST">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="email_or_phone" required placeholder="Email or Phone">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="password" required placeholder="Password">
                    <span class="show">SHOW</span>
                </div>
                <div class="pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
            <div class="signup">
                Don't have an account?
                <a href="register.php">Signup Now</a>
            </div>
        </div>
    </div>
    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        showBtn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            } else {
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
        });
    </script>
</body>
<?php include "assets/footer.php" ?>

</html>
