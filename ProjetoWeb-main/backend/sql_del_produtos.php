<?php 
// verificar sessao  if session ("adm")<>"ativo" then
//   redirecionar para login
// else 

$idproduto = $_POST['cbousuario'];


//  connection bd
include 'bd.php';
 
$sql = "delete from produtos where idproduto='$idproduto'";
mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "Produto excluido com sucesso!";

?>