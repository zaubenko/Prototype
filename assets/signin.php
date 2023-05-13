<?php
    session_start();   
    require_once 'connect.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `users` WHERE email ='$email' AND password='$password'";
    $querry=mysqli_query($connect,$sql);
    if(mysqli_num_rows($querry)>0){
        $user=mysqli_fetch_assoc($querry);
        $_SESSION['user']=[
            "id"=> $user['id'],
            "login"=> $user['login'],
            "avatar"=> $user['avatar'],
            "email"=> $user['email']
        ];
        header('Location: ../profile.php');
    } else{
        $_SESSION['msg']='Not correct email or password';
        header('Location: ../login.php');    }
?>
