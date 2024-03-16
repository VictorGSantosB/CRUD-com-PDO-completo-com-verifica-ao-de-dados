<?php 
session_start();
require 'conexao.php';
if(isset($_POST['submit'])){ // Verifiqua se o formulário foi enviado
    if(isset($_POST['id'])){ // Verifiqua se todos os campos estão presentes
        $id = $_POST['id'];
        $nameEdit = $_POST['name'];
        $senhaEdit = $_POST['senha'];
        $sql = "UPDATE usuarios SET user = :user, senha = :senha WHERE id = :id";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":user", $nameEdit); 
        $resultado->bindValue(":senha", $senhaEdit);
        $resultado->bindValue(":id", $id); 
        if($resultado->execute()){
            echo "Cliente atualizado com sucesso";
            header("Location:index.php?msgEdit=editado");
        }else{
            echo "Erro ao atualizar o cliente";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo $_POST['user']?></h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"> 
        <input type="text" name="name">
        <input type="text" name="senha">
        <input type="submit" name="submit" value="Submit">  
    </form>
</body>
</html>
