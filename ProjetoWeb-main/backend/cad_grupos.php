<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}
?>

CADASTRO DE GRUPOS

<form action="sql_cad_grupos.php" method ="post"><br>
Nome: <input type="text" name="txtnome"><br>
Cor: <select name= "cbocor">
	<option value = "0000ff"> azul </option> 
	<option value = "00cc66"> Laranja </option>
	<option value = "00cc00"> Verde </option>
	<option value = "ff0000"> Vermelho </option>
</select> <br>
Situação: <select name="cbosituacao">
	<option value ="A"> Ativo </option>
	<option value ="B"> Bloqueado </option>
</select>
<input type="submit" value="CADASTRAR"> <BR>
</FORM>
