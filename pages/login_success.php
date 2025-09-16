<?php

session_start();

if (!isset($_SESSION['email'])) {
    $_SESSION['permission_error'] = 'Zugriff verweigert. Bitte authentifizieren Sie sich, um fortzufahren!';
    header("Location: ../index.php");
    exit();
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
        <div class="box">
            <p>Login erfolgreich</p>
            <h1>Willkommen, <span><?= $_SESSION['name']; ?></span>!</h1>
            <button class="log_out" onclick="window.location.href='../logout.php'">Abmelden</button>
        </div>
    </div>


    <!-- Jqeury JS -->
    <script src="../assets/vendor/jquery/jquery-3.7.1.min.js"></script>
    <!-- Script JS -->
    <script src="../assets/js/script.js"></script>
</body>

</html>