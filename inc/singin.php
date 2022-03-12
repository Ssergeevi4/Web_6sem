<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "lab_2");

    $login = $_POST['login'];
    $password = md5(md5(trim($_POST['password'])));

//echo $login." ".$password;
//$q="SELECT * FROM users WHERE 'login' = '$login' AND 'password' = '$password'";
//echo $q;
    $check_user = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    $row = $check_user->fetch_assoc();
  //  print_r($password);
    if($row != false && $row != null) {
        $_SESSION["id"]=$row["id"];
        header('Location: ../index2.php');}
    else{
        $_SESSION['message'] = 'не верный лог или пароль';
    }
    echo (mysqli_num_rows($check_user));