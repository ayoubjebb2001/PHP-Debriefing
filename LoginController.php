<?php
    require_once __DIR__.'/database/connection.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' and role_id=1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['auth_user'] = $user;
            header('Location: ./views/admin/dashboard.php');
        }else{
            session_start();
            $_SESSION['login_error'] = 'Access denied';
            header('Location: ./views/auth/login.php');
        }
    }