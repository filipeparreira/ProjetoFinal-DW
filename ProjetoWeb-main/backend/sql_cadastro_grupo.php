<?php
//<--#include file="bd.php"-->
// verificar sessão adm 
//if session ("adm") <> "ativo" then
    // encaminhar para login
//else

$nome1 = $_POST['txtnome'];
$cor = $_POST['cbocor'];
$situacao = $_POST['cbosituacao'];

//  connection bd
include 'bd.php';

$sql = "INSERT INTO grupos (nomegrupo, corgrupo, situacaogrupo) VALUES ('$nome1', '$cor','$situacao')";

mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "grupo cadastrado com sucesso!";
?>