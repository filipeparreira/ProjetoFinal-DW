<?php
// verificar sessão adm 
//if session ("adm") <> "ativo" then
    // encaminhar para login
//else

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