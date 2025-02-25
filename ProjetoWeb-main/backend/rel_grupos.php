<?php
include 'bd.php';

//criando a query de consulta à tabela criada
$sql = mysqli_query($strcon, "SELECT * FROM grupos") or die(
mysqli_error($cx) //caso haja um erro na consulta
);

echo "<table border= '1' >
        <th>id</th>
        <th>Nome</th>
        <th>cor</th>
        <th>situacao</th>";

//pecorrendo os registros da consulta.
while($aux = mysqli_fetch_assoc($sql)){ 
    echo"<tr>
            <td>" . htmlspecialchars($aux['idgrupo']) . "</td>
            <td>" . htmlspecialchars($aux['nomegrupo']) . "</td>
            <td>" . htmlspecialchars($aux['corgrupo']) . "</td>
            <td>" . htmlspecialchars($aux['situacaogrupo']) . "</td>
        </tr>";

    }
    echo "</table>";
?>