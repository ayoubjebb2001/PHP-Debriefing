<?php include __DIR__.'/../../layouts/header.php'; ?>
<?php include __DIR__.'/../../../database/connection.php'; ?>
<?php
if (!isset($_SESSION['auth_user'])) {
    header('Location: ../auth/login.php');
}
if(isset($_POST['add'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = md5('123456');
    $sql = "INSERT INTO users (fullname, username,password, role_id) VALUES ('$fullname', '$username','$password' ,'$role')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: ../dashboard.php');
    }else{
        echo 'Error: '.mysqli_error($conn);
    }
}
?>

<h2>Add User</h2>

<form method="post" action="">
    <!-- TODO: Add input fields for name and email -->
    <div class="form-group">
        <label for="fullname">fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required>
    </div>
    <div class="form-group">
        <label for="username">username:</label>
        <input type="username" class="form-control" name="username" id="username" required>
    </div>

    <div class="form-group">
       <select name="role" id="role">
        <option value="1">Admin</option>
        <option value="2"> User</option>
       </select>
    </div>

    <!-- TODO: Add submit button -->
    <button type="submit" class="btn btn-primary" name="add">Add Employee</button>
</form>

<?php include __DIR__.'/../../layouts/footer.php'; ?>
