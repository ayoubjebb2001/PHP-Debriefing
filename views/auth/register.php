<?php include __DIR__.'/../layouts/header.php';
    if(isset($_SESSION['auth_user'])){
        header('Location: ../admin/dashboard.php');
    }
?>

<h2>Register</h2>
<!-- TODO: Add registration form with input fields for username, password, etc. -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="../../RegisterController.php">
    <?php
        if(isset($_SESSION['db_error'])){
            echo '<div class="alert alert-danger">'.$_SESSION['db_error'].'</div>';
            unset($_SESSION['db_error']);
        }
    ?>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required value="<?=$_SESSION['username'] ?? ''; ?>">
    </div>
    <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required value="<?=$_SESSION['fullname'] ?? ''; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required value="<?=$_SESSION['password'] ?? ''; ?>">
    </div>
    <!-- Add other registration fields as needed -->
    <button type="submit" class="btn btn-success" name="register">Register</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
