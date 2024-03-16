<?php
session_start();
require 'conexao.php';
if(!isset($_SESSION['id'])){
  header("Location:login.php");
  exit();
} 

$sql = "SELECT * FROM usuarios";
$resultado = $conn->prepare($sql);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC); // Obtém todos os resultados como um array associativo
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET['msg'])) {
    if($_GET['msg'] === 'deleted') {
        echo '<div style="color:green;">Usuário excluído com sucesso.</div>';
    } elseif($_GET['msg'] === 'error') {
        echo '<div style="color:red;">Erro ao excluir usuário.</div>';
    }
}
if(isset($_GET['msgEdit'])){
  if($_GET['msgEdit'] === 'editado'){
    echo '<div style="color:green;">Usuário editado com sucesso.</div>';
  }
}
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">User</th>
      <th scope="col">senha</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($usuarios as $usuario){
        echo "<tr>";
        echo "<td>" . $usuario['id'] . "</td>";
        echo "<td>" . $usuario['user'] . "</td>"; 
        echo "<td>" . $usuario['senha'] . "</td>";
        echo '<td>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="' . $usuario['id'] . '">
                    <input type="hidden" name="user" value="' . $usuario['user'] . '">
                    <button type="submit" name="delete">Delete</button>
                </form>
              </td>';
        echo '<td>
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="' . $usuario['id'] . '">
                    <input type="hidden" name="user" value="' . $usuario['user'] . '">
                    <button type="submit" name="edit">Edit</button>
                </form>
              </td>';
        echo "</tr>";
    }
    ?>
</tbody>
</table>
</body>

</html>
