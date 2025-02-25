<?php 
// verificar sessao  if session ("adm")<>"ativo" then
//   redirecionar para login
// else 

$idgrupo = $_POST['cbousuario'];


//  connection bd
include 'bd.php';
 
$sql = "delete from grupos where idgrupo='$idgrupo'";
mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "Grupo excluido com sucesso!";

?>