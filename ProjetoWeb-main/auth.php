<?php
session_start();
include 'backend/bd.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$resultado = mysqli_query($strcon, $sql);
$dados = mysqli_fetch_array($resultado);
$total = mysqli_num_rows($resultado);

if ($total) {
    if (!strcmp($senha, $dados["senha"])) {
        // Criando sessão para armazenar usuário logado
        $_SESSION['usuario_id'] = $dados['id'];
        $_SESSION['usuario_nome'] = $dados['nome'];
        $_SESSION['usuario_email'] = $dados['email'];
        $_SESSION['logado'] = true; // Indica que o usuário está logado
        
        header('Location: backend/menu.php');
        exit();
    }
} else {
    echo "O login fornecido por você é inexistente!";
}
?>
