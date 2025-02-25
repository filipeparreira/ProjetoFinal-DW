<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}



include 'bd.php';

//criando a query de consulta à tabela criada
$sql = mysqli_query($strcon, "SELECT * FROM produtos") or die(
mysqli_error($cx) //caso haja um erro na consulta
);

echo "<table border= '1' >
        <th>idGrupo</th>
        <th>idProduto</th>
        <th>nome</th>
        <th>preco</th>
        <th>desconto</th>
        <th>descricao</th>
        <th>situacao</th>
        <th>foto</th>
        <th>fornecedor</th>";

//pecorrendo os registros da consulta.
while($aux = mysqli_fetch_assoc($sql)){ 
    echo"<tr>
            <td>" . htmlspecialchars($aux['idproduto']) . "</td>
            <td>" . htmlspecialchars($aux['idgrupo']) . "</td>
            <td>" . htmlspecialchars($aux['nomeproduto']) . "</td>
            <td>" . htmlspecialchars($aux['precoproduto']) . "</td>
            <td>" . htmlspecialchars($aux['descontoproduto']) . "</td>
            <td>" . htmlspecialchars($aux['descricaoproduto']) . "</td>
            <td>" . htmlspecialchars($aux['situacaoproduto']) . "</td>
            <td>" . htmlspecialchars($aux['fotoproduto']) . "</td>
            <td>" . htmlspecialchars($aux['fornecedorproduto']) . "</td>
        </tr>";

    }
    echo "</table>";
?>