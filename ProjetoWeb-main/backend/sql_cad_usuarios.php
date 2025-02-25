<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}


$login = $_POST['txtlogin'];
$senha = $_POST['txtsenha'];
$email = $_POST['txtemail'];
$perfil = $_POST['txtperfil'];

//  connection bd
include 'bd.php';
 
$sql = "INSERT INTO usuarios (nome, senha, email, perfil) VALUES ('$login', '$senha','$email', '$perfil')";

mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "Usuário cadastrado com sucesso!";

?>