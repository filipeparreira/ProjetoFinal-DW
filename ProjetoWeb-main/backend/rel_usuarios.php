<?php
include 'bd.php';
//criando a query de consulta à tabela criada
$sql = mysqli_query($strcon, "SELECT * FROM usuarios") or die(
mysqli_error($cx) //caso haja um erro na consulta
);

echo "<table border= '1' >
        <th>id</th>
        <th>Nome</th>
        <th>senha</th>
        <th>E-mail</th>";

//pecorrendo os registros da consulta.
while($aux = mysqli_fetch_assoc($sql)){ 
    echo"<tr>
            <td>" . htmlspecialchars($aux['idusuario']) . "</td>
            <td>" . htmlspecialchars($aux['loginusuario']) . "</td>
            <td>" . htmlspecialchars($aux['senhausuario']) . "</td>
            <td>" . htmlspecialchars($aux['emailusuario']) . "</td>
        </tr>";

    }
    echo "</table>";
?>