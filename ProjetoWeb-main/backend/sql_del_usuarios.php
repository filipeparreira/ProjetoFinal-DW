<?php 

session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}

$idusuario = $_POST['cbousuario'];


//  connection bd
include 'bd.php';
 
$sql = "delete from usuarios where idusuario='$idusuario'";
mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "Usuário excluido com sucesso!";

?>