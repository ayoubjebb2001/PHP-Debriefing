<?php
    require_once __DIR__.'/database/connection.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];

        if(empty($username)){
            $errors['username'] = 'Username is required';
        } else if(empty($fullname)){
            $errors['fullname'] = 'Fullname is required';
        } else if(empty($password)){
            $errors['password'] = 'Password is required';
        }
        $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){
                echo 'Username already exists';
                $errors['username'] = 'Username already exists';
            }
        if($errors){
            foreach($errors as $key => $value){
                $_SESSION[$key] = $value;
            }
            header('Location: views/auth/register.php');
            exit();
        }
        else {
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) < 1){
                $role= 1;
            }else{
                $role= 2;
            }
            $password = md5($password);
            $query = "INSERT INTO users (username, fullname, password,role_id) VALUES ('$username', '$fullname', '$password',$role)";
            $result = mysqli_query($conn, $query);
            if($result){
                header('Location: views/auth/login.php'); 
            } else {
                $errors['db_error'] = 'Database error: failed to register';
                $_SESSION['db_error'] = $errors['db_error'];
                header('Location: views/auth/register.php');
                exit();
            }
        }
    }