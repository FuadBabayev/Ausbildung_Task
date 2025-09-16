<?php

session_start();

$errors = [
    'permission' => $_SESSION['permission_error'] ?? "",
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
    <title>Fuad Babayev DieMedialen Task</title>
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/fontawesome.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

    <div class="container">
        <h1>Herzlich Willkommen!</h1>
        <?= showError($errors['permission']); ?>
        <div class="pages">
            <a href="pages/login.php">Anmelden</a>
            <a href="pages/register.php">Registrieren</a>
        </div>
    </div>



    <!-- Jqeury JS -->
    <script src="assets/vendor/jquery/jquery-3.7.1.min.js"></script>
    <!-- Script JS -->
    <script src="assets/js/script.js"></script>
</body>

</html>