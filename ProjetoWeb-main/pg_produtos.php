<?php
include 'backend/bd.php'; // Conexão com o banco

// Verifica se o parâmetro 'grupo_id' foi enviado na URL
if (isset($_GET['grupo_id'])) {
    $grupo_id = intval($_GET['grupo_id']);
} else {
    die("Grupo não especificado.");
}

// Consulta os dados do grupo
$sqlGrupo = "SELECT * FROM grupos WHERE id = $grupo_id";
$resultGrupo = mysqli_query($strcon, $sqlGrupo);
if (mysqli_num_rows($resultGrupo) == 0) {
    die("Grupo não encontrado.");
}
$grupoDados = mysqli_fetch_assoc($resultGrupo);

// Consulta os produtos deste grupo
$sqlProdutos = "SELECT * FROM produtos WHERE grupo_id = $grupo_id";
$resultProdutos = mysqli_query($strcon, $sqlProdutos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos do Grupo <?php echo htmlspecialchars($grupoDados['nomegrupo']); ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo extra para layout em grid (opcional) */
        .produtos-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .produto {
            width: 200px;
            text-align: center;
        }
        .produto img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="imagens/logo_branca.png" alt="BP Rural Produtos Agropecuários">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <section id="produtos-grupo">
        <h2>Produtos do Grupo: <?php echo htmlspecialchars($grupoDados['nomegrupo']); ?></h2>
        <div class="produtos-container">
            <?php while ($produto = mysqli_fetch_assoc($resultProdutos)) { ?>
                <div class="produto">
                    <a href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                        <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                        <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 BP Rural Produtos Agropecuários. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

<?php
mysqli_close($strcon);
?>
