<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? "",
];

session_unset();


function showError($error)
{
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/fontawesome.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>

    <div class="container">
        <div class="form-box" id="login-form">
            <form action="../login_register.php" method="post">
                <h2>Anmeldung</h2>
                <?= showError($errors['login']); ?>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Passwort" required>
                    <div class="icon blind-button"><i class="fa-solid fa-eye-slash"></i></div>
                </div>

                <button type="submit" name="login">Anmelden</button>
                <p>Hast du kein Konto? <a href="register.php">Registrieren</a></p>
            </form>
        </div>
    </div>


    <!-- Jqeury JS -->
    <script src="../assets/vendor/jquery/jquery-3.7.1.min.js"></script>
    <!-- Script JS -->
    <script src="../assets/js/script.js"></script>
</body>

</html>