<?php
    session_start();   
    require_once 'connect.php';

    $login=$_POST['login'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password_confirm=$_POST['password_confirm'];

    if($password === $password_confirm) 
    {
        $path = 'uploads/'. time(). $_FILES['avatar']['name'];
        if(!move_uploaded_file($_FILES['avatar']['tmp_name'],$path)){
            $_SESSION['msg']='error';
            header('Location: ../register.php');
        }
        mysqli_query($connect,"INSERT INTO `users` (`id`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$login', '$email', '$password', '$path')");
        header('Location: ../index.php');
    } else{
        $_SESSION['msg'] = 'password not confirm' ;
        header('Location: ../register.php');
    } 

?>