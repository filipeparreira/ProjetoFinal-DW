<?php
// verificar sessao if session ("adm")<>"ativo" then redirecionar para login

//else

// Create connection
include 'bd.php';
 
//criando a query de consulta toda a tabela usuarios  
$sql = mysqli_query($strcon, "SELECT * FROM usuarios") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
);
// abaixo tem-se o combo-box (tag select, que carrega os dados diretamente do banco de dados)
?>


<form  action="sql_del_usuarios.php" method="post"><br>


Usuario:. <select name="cbousuario">
    <option> Selecione </option>
<?php 
// a primeira opção do combo-box (Selecione) é estática, já o restante dos itens é dinamico
// ou seja, carrega os registros da tabela Grupos, veja a estrutura de repetição While abaixo
     while ($aux = mysqli_fetch_assoc ($sql)){ ?>
    <option value="<?php echo $aux['idusuario']; ?>"><?php echo $aux['loginusuario']; ?>
    </option> <?php
    // aqui finaliza o carregamento de 1 item, caso tenha mais itens na tabela grupos,
    // será carregado utilizando a instrução das linha acima (option value...).
      }
  ?>
 </select><br><br>

<input type="submit"  value="EXCLUIR"><br><br>
</form>