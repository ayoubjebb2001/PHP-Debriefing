<?php include __DIR__.'/../layouts/header.php';
    if(isset($_SESSION['auth_user'])){
        header('Location: ../admin/dashboard.php');
    }
?>

<h2>Login</h2>
<!-- TODO: Add login form with input fields for username and password -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="../../LoginController.php">
    <?php
        if(isset($_SESSION['login_error'])){
            echo '<div class="alert alert-danger">'.$_SESSION['login_error'].'</div>';
            unset($_SESSION['login_error']);
        }?>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
