<?php include __DIR__.'/../../layouts/header.php';
require_once __DIR__.'/../../../database/connection.php';
    if(!isset($_SESSION['auth_user'])){
        header('Location: ../../auth/login.php');
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
    }
    if(isset($_POST['edit'])){
        $id = $user['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $sql = "UPDATE users SET fullname = '$fullname', username = '$username', role_id = '$role' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: ../dashboard.php');
        }else{
            echo 'Error: '.mysqli_error($conn);
        }
    }
?>

<h2>Edit User</h2>

<form method="post" action="">
    <!-- TODO: Add input fields for name and email -->
    <div class="form-group">
        <label for="fullname">fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required
        value="<?= $user['fullname'] ?>">
    </div>
    <div class="form-group">
        <label for="username">username:</label>
        <input type="username" class="form-control" name="username" id="username" required
        value="<?= $user['username'] ?>">
    </div>

    <div class="form-group">
       <select name="role" id="role">
        <option value="1"> Admin</option>
        <option value="2"> User</option>
       </select>
    </div>

    <!-- TODO: Add submit button -->
    <button type="submit" class="btn btn-primary" name="edit">Edit Employee</button>
</form>

<?php include __DIR__.'/../../layouts/footer.php'; ?>
