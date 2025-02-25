<?php
session_start();

include 'backend\bd.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email' and senha='$senha'";
$resultado =  mysqli_query($strcon,$sql);
$dados = mysqli_fetch_array($resultado);
$total = mysqli_num_rows($resultado);

if($total){
    if (!strcmp($senha, $dados["senha"])) {
        header('Location: backend\menu.php');
    }
}else{
    echo "O login fornecido por você é inexistente!";
}
?>