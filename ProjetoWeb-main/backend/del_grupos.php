<?php
<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}
// Create connection
include 'bd.php';
 
//criando a query de consulta toda a tabela usuarios  
$sql = mysqli_query($strcon, "SELECT * FROM grupos") or die( 
  mysqli_error($cx) //caso haja um erro na consulta 
);
// abaixo tem-se o combo-box (tag select, que carrega os dados diretamente do banco de dados)
?>


<form  action="sql_del_grupos.php" method="post"><br>


Grupo:. <select name="cbousuario">
    <option> Selecione </option>
<?php 
// a primeira opção do combo-box (Selecione) é estática, já o restante dos itens é dinamico
// ou seja, carrega os registros da tabela Grupos, veja a estrutura de repetição While abaixo
     while ($aux = mysqli_fetch_assoc ($sql)){ ?>
    <option value="<?php echo $aux['idgrupo']; ?>"><?php echo $aux['nomegrupo']; ?>
    </option> <?php
    // aqui finaliza o carregamento de 1 item, caso tenha mais itens na tabela grupos,
    // será carregado utilizando a instrução das linha acima (option value...).
      }
  ?>
 </select><br><br>

<input type="submit"  value="EXCLUIR"><br><br>
</form>