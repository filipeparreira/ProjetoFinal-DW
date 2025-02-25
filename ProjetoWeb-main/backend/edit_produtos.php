<?php


session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}


include 'bd.php'; // Conexão com o banco

// Carrega a lista de produtos para o seletor
$sqlProdutos = mysqli_query($strcon, "SELECT id, nome FROM produtos ORDER BY nome ASC") or die(mysqli_error($strcon));

// Verifica se um produto foi selecionado
$produtoSelecionado = null;
if (isset($_GET['produto_id'])) {
    $produto_id = intval($_GET['produto_id']);
    $sqlProduto = mysqli_query($strcon, "SELECT * FROM produtos WHERE id = $produto_id");
    if (mysqli_num_rows($sqlProduto) > 0) {
        $produtoSelecionado = mysqli_fetch_assoc($sqlProduto);
    } else {
        echo "<p style='color:red;'>Produto não encontrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Editar Produto</h2>

<!-- Seletor de produtos -->
<form method="GET">
    <label for="produto_id">Selecione um produto:</label>
    <select name="produto_id" id="produto_id" onchange="this.form.submit()">
        <option value="">Selecione...</option>
        <?php while ($produto = mysqli_fetch_assoc($sqlProdutos)) { ?>
            <option value="<?php echo $produto['id']; ?>" 
                <?php echo (isset($produtoSelecionado) && $produtoSelecionado['id'] == $produto['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($produto['nome']); ?>
            </option>
        <?php } ?>
    </select>
</form>

<!-- Formulário de edição -->
<?php if ($produtoSelecionado) { ?>
<form action="sql_atualiza_produto.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="produto_id" value="<?php echo $produtoSelecionado['id']; ?>">

    Nome:. <input type="text" name="txtnome" value="<?php echo htmlspecialchars($produtoSelecionado['nome']); ?>" required><br>
    Preço:. <input type="text" name="txtpreco" value="<?php echo htmlspecialchars($produtoSelecionado['preco']); ?>" required><br>
    Desconto:. <input type="text" name="txtdesconto" value="<?php echo htmlspecialchars($produtoSelecionado['desconto']); ?>"><br>
    Descrição:. <textarea name="txtdescricao"><?php echo htmlspecialchars($produtoSelecionado['descricao']); ?></textarea><br>
    
    Situação:. <select name="cbosituacao">
        <option value="A" <?php echo ($produtoSelecionado['situacao'] == 'A') ? 'selected' : ''; ?>>Ativo</option>
        <option value="B" <?php echo ($produtoSelecionado['situacao'] == 'B') ? 'selected' : ''; ?>>Bloqueado</option>
    </select><br>
    
    Promoção:. <select name="cbopromocao">
        <option value="sim" <?php echo ($produtoSelecionado['promocao'] == 'sim') ? 'selected' : ''; ?>>Sim</option>
        <option value="nao" <?php echo ($produtoSelecionado['promocao'] == 'nao') ? 'selected' : ''; ?>>Não</option>
    </select><br>

    **Foto Atual:** <br>
    <?php if (!empty($produtoSelecionado['imagem'])) { ?>
        <img src="<?php echo $produtoSelecionado['imagem']; ?>" width="100"><br>
    <?php } ?>
    **Nova Foto:** <input type="file" name="foto"><br>

    Fornecedor:. <input type="text" name="txtfornecedor" value="<?php echo htmlspecialchars($produtoSelecionado['fornecedor']); ?>"> <br>

    <input type="submit" value="ATUALIZAR"> <br><br>
</form>
<?php } ?>

</body>
</html>
