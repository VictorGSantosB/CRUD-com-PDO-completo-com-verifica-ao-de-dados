<?php
if(isset($_POST['user']) && !empty($_POST['senha']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    session_start();
    require 'conexao.php';
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM usuarios WHERE user = :user AND senha = :senha";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue("user",$user);
    $resultado->bindValue("senha",$senha);
    $resultado->execute();

    if($resultado->rowCount() > 0){
        $dado = $resultado->fetch();
        // echo $dado['user'];
        $_SESSION['id'] = $dado['id'];
        $_SESSION['user'] = $dado['user'];
        $_SESSION['senha'] = $dado['senha'];
        header("Location:index.php");
        exit();
    }else{
        header("Location:login.php");
    exit();
    }
}else{
    header("Location:login.php");
    exit();
}