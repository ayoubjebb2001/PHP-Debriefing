<?php
    require_once __DIR__.'/../../../database/connection.php';
    if(!isset($_SESSION['auth_user'])){
        header('Location: ../../auth/login.php');
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if($result){
            header('Location: ../dashboard.php');
        }else{
            echo 'Error: '.mysqli_error($conn);
        }
    }