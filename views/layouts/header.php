<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Mise en situation</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="#">My App</a>
        
        <!-- Navigation Links -->
        <ul class="navbar-nav ml-auto">
        <?php
            if(isset($_SESSION['auth_user'])):?>
                <li class="nav-item"><a class="nav-link" href="../auth/logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="../auth/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="../auth/register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="container mt-4">