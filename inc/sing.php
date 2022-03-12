<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "lab_2");

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

        $password = md5(md5(trim($password)));


        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES (NULL, '$login', '$email', '$password')");

        $_SESSION['message'] = 'Успешно зарегистрирован';
        header('Location: ../index.php');

    } else{
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }


?>



