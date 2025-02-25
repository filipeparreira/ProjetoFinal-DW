<?php
//if session ("adm") <> "ativo" then
//   response.redirect "default.asp"
//else
//  connection bd


// Create connection
include 'bd.php';

//criando a query de consulta à tabela criada 
$sql = mysqli_query($strcon, "SELECT * FROM grupos") or die(mysqli_error($cx) //caso haja um erro na consulta 
);
// abaixo tem-se o combo-box (tag select, que carrega os dados diretamente do banco de dados)
?>

CADASTRO DE PRODUTOS
<form action="sql_cad_produtos.php" method="post" enctype="multipart/form-data">
    <br>
    Grupos:.<select name="cbogrupo" required>
        <option value="">Selecione</option>
        <?php
        while ($aux = mysqli_fetch_assoc($sql)) { 
            echo '<option value="' . $aux['id'] . '">' . $aux['nomegrupo'] . '</option>';
        }
        ?>
    </select><br><br>
    Nome:. <input type="text" name="txtnome" size="20" maxlength="50"><br>
    Preço:. <input type="text" name="txtpreco" size="10" maxlength="20"><br>
    Desconto:. <input type="text" name="txtdesconto" size="10" maxlength="20"><br>
    Descrição:. <textarea name="txtdescricao" cols="30" rows="5"></textarea><br>
    Situação:. <select name="cbosituacao">
        <option value="A">Ativo</option>
        <option value="B">Bloqueado</option>
    </select><br>
    **Foto:** <input type="file" name="foto"><br>
    Fornecedor:. <input type="text" name="txtfornecedor"> <br>
    <input type="submit" value="CADASTRAR"> <br><br>
</form>

