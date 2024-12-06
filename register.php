<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include "assets/head.php" ?>
<link rel="stylesheet" href="css/create.css">

<body>
    <?php include "assets/nav.php" ?>
    <div class="bg-img">
        <div class="content">
            <header>Register on Vinilyze!</header>
            <!-- Updated Form -->
            <form action="checkRegister.php" method="POST">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="email" name="email" required placeholder="Email">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="password" required placeholder="Password">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="confirm_password" required placeholder="Confirm Password">
                </div>
                <div class="field">
                    <input type="submit" value="REGISTER">
                </div>
            </form>
            <div class="signup">
                Already have an account?
                <a href="login.php">Login Now</a>
            </div>
        </div>
    </div>
    <script>
        const pass_fields = document.querySelectorAll('.pass-key');
        pass_fields.forEach(field => {
            field.addEventListener('input', function() {
                const confirmPassword = document.querySelector('input[name="confirm_password"]');
                const password = document.querySelector('input[name="password"]');
                if (confirmPassword.value !== "" && password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords do not match.");
                } else {
                    confirmPassword.setCustomValidity("");
                }
            });
        });
    </script>
</body>
<?php include "assets/footer.php" ?>

</html>
