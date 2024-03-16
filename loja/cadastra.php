<?php
if(isset($_POST['user']) && !empty($_POST['senha']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    session_start();
    require 'conexao.php';
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    $sql = "INSERT INTO usuarios(user,senha) VALUES(:nome,:senha)";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue("nome",$user);
    $resultado->bindValue("senha",$senha);
    $resultado->execute();
    header("Location:login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, cyan, yellow);
        }
        div{
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <form method="post" action="">

        <h1>Login</h1>
        <input type="text" name="user" placeholder="Nome">
        <br><br>
        <input type="password" name="senha" placeholder="Senha">
        <br><br>
        <button type="submit">Enviar</button>
        </form>
       
    </div>
</body>
</html>