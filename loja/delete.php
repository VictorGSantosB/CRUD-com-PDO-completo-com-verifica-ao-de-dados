<?php
session_start();
require 'conexao.php';
//VARIAVEL QUE FOI ENVIADA PELO FORMULARIO
if(isset($_POST['delete'])) {
    $id = $_POST['id']; //ENVIADA PELO FORMULARIO
    $nome = $_POST['user'];
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue("id", $id);
    if($resultado->execute()) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        header("Location: index.php?msg=error");
        exit();
    }
}

