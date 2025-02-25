<?php
// Conexão com o banco
include 'backend/bd.php';

// Consulta os produtos que estão em promoção e ativos
$sqlPromocoes = "SELECT * FROM produtos WHERE promocao = 'sim' AND situacao = 'A'";
$resultPromocoes = mysqli_query($strcon, $sqlPromocoes) or die(mysqli_error($strcon));

// Para cada categoria, usamos um JOIN com a tabela 'grupos'
// Certifique-se de que os nomes dos grupos são exatamente os mesmos definidos na tabela 'grupos'
$sqlTatuadeiras = "SELECT p.* 
                    FROM produtos p 
                    JOIN grupos g ON p.grupo_id = g.id 
                    WHERE g.nomegrupo = 'Tatuadeiras' AND p.situacao = 'A'";
$resultTatuadeiras = mysqli_query($strcon, $sqlTatuadeiras) or die(mysqli_error($strcon));

$sqlTintas = "SELECT p.* 
              FROM produtos p 
              JOIN grupos g ON p.grupo_id = g.id 
              WHERE g.nomegrupo = 'Tintas e Pastas' AND p.situacao = 'A'";
$resultTintas = mysqli_query($strcon, $sqlTintas) or die(mysqli_error($strcon));

$sqlBrincos = "SELECT p.* 
               FROM produtos p 
               JOIN grupos g ON p.grupo_id = g.id 
               WHERE g.nomegrupo = 'Brincos e Aplicadores' AND p.situacao = 'A'";
$resultBrincos = mysqli_query($strcon, $sqlBrincos) or die(mysqli_error($strcon));

$sqlMarcadores = "SELECT p.* 
                  FROM produtos p 
                  JOIN grupos g ON p.grupo_id = g.id 
                  WHERE g.nomegrupo = 'Marcadores e Fogareiros' AND p.situacao = 'A'";
$resultMarcadores = mysqli_query($strcon, $sqlMarcadores) or die(mysqli_error($strcon));

$sqlDiversos = "SELECT p.* 
                FROM produtos p 
                JOIN grupos g ON p.grupo_id = g.id 
                WHERE g.nomegrupo = 'Diversos' AND p.situacao = 'A'";
$resultDiversos = mysqli_query($strcon, $sqlDiversos) or die(mysqli_error($strcon));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BP Rural Produtos Agropecuários</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilização extra para seções de promoções e categorias */
        .promocoes-container, .categorias-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 20px;
            padding: 10px;
        }
        .produto-promocao {
            flex: 0 0 auto;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 10px;
            text-align: center;
            transition: transform 0.3s;
        }
        .produto-promocao:hover {
            transform: scale(1.03);
        }
        .produto-promocao img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .preco-antigo {
            font-size: 0.8em;
            color: #999;
            text-decoration: line-through;
            margin: 5px 0;
        }
        .preco-promocao {
            font-size: 1.2em;
            color: #d84315;
            font-weight: bold;
            margin: 5px 0;
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
                <li><a href="#categorias">Categorias</a></li>
                <li><a href="#promocoes">Promoções</a></li>
                <li><a href="#contato">Contato</a></li>
                <!-- Link para a área administrativa -->
                <li><a href="login.html">Área Administrativa</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Seção de Categorias -->
    <section id="categorias">
        <h2>Categorias</h2>
        
        <!-- Exemplo: Tatuadeiras -->
        <div class="categoria">
            <h3>Tatuadeiras</h3>
            <p>Confira nossa linha de tatuadeiras para identificação animal.</p>
            <div class="categorias-container">
                <?php 
                if(mysqli_num_rows($resultTatuadeiras) > 0){
                    while ($produto = mysqli_fetch_assoc($resultTatuadeiras)) {                     
                ?>    
                    <div class="produto-promocao">
                        <a href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                            <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                            <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        </a>
                    </div>
                <?php 
                    } 
                } else {
                    echo '<p>Sem itens</p>';
                }
                ?>
            </div>
        </div>
        
        <!-- Exemplo: Tintas e Pastas -->
        <div class="categoria">
            <h3>Tintas e Pastas</h3>
            <p>Tintas e pastas para tatuagem de animais.</p>
            <div class="categorias-container">
                <?php 
                if(mysqli_num_rows($resultTintas) > 0){
                    while ($produto = mysqli_fetch_assoc($resultTintas)) {                     
                ?>    
                    <div class="produto-promocao">
                        <a href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                            <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                            <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        </a>
                    </div>
                <?php 
                    } 
                } else {
                    echo '<p>Sem itens</p>';
                }
                ?>
            </div>
        </div>
        
        <!-- Exemplo: Brincos e Aplicadores -->
        <div class="categoria">
            <h3>Brincos e Aplicadores</h3>
            <p>Brincos e aplicadores para identificação animal.</p>
            <div class="categorias-container">
                <?php 
                if(mysqli_num_rows($resultBrincos) > 0){
                    while ($produto = mysqli_fetch_assoc($resultBrincos)) {                     
                ?>    
                    <div class="produto-promocao">
                        <a href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                            <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                            <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        </a>
                    </div>
                <?php 
                    } 
                } else {
                    echo '<p>Sem itens</p>';
                }
                ?>
            </div>
        </div>
        
        <!-- Exemplo: Marcadores e Fogareiros -->
        <div class="categoria">
            <h3>Marcadores e Fogareiros</h3>
            <p>Marcadores e fogareiros para identificação animal.</p>
            <div class="categorias-container">
                <?php 
                if(mysqli_num_rows($resultMarcadores) > 0){
                    while ($produto = mysqli_fetch_assoc($resultMarcadores)) {                     
                ?>    
                    <div class="produto-promocao">
                        <a href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                            <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                            <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        </a>
                    </div>
                <?php 
                    } 
                } else {
                    echo '<p>Sem itens</p>';
                }
                ?>
            </div>
        </div>
        
        <!-- Exemplo: Diversos -->
        <div class="categoria">
            <h3>Diversos</h3>
            <p>Produtos diversos para cuidados com animais.</p>
            <div class="categorias-container">
                <?php 
                if(mysqli_num_rows($resultDiversos) > 0){
                    while ($produto = mysqli_fetch_assoc($resultDiversos)) {                     
                ?>    
                    <div class="produto-promocao">
                        <a href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                            <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                            <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        </a>
                    </div>
                <?php 
                    } 
                } else {
                    echo '<p>Sem itens</p>';
                }
                ?>
            </div>
        </div>
        
    </section>

    <!-- Seção de Promoções -->
    <section id="promocoes">
        <h2>Promoções</h2>
        <div class="promocoes-container">
            <?php 
            if(mysqli_num_rows($resultPromocoes) > 0){
                while ($produto = mysqli_fetch_assoc($resultPromocoes)) { 
                    // Preço original
                    $precoOriginal = $produto['preco'];
                    // Valor de desconto (absoluto)
                    $desconto = $produto['desconto'];
                    // Preço com desconto
                    $precoPromocao = $precoOriginal - $desconto;
                    // Formata os valores para o padrão brasileiro
                    $precoOriginalFormatado = "R$ " . number_format($precoOriginal, 2, ',', '.');
                    $precoPromocaoFormatado = "R$ " . number_format($precoPromocao, 2, ',', '.');
            ?>
            <div class="produto-promocao">
                <a  href="produto.html?nome=<?php echo urlencode($produto['nome']); ?>&imagem=backend/<?php echo urlencode($produto['imagem']); ?>&descricao=<?php echo urlencode($produto['descricao']); ?>&fornecedor=<?php echo urlencode($produto['fornecedor']); ?>">
                    <img src="backend/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                    <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                    <p class="preco-antigo">De: <?php echo $precoOriginalFormatado; ?></p>
                    <p class="preco-promocao">Para: <?php echo $precoPromocaoFormatado; ?></p>
                </a>
            </div>
            <?php 
                }
            } else {
                echo '<p>Sem itens</p>';
            }
            ?>
        </div>
    </section>

    <!-- Seção de Contato -->
    <section id="contato">
        <h2>Contato</h2>
        <p>Entre em contato conosco através dos seguintes meios:</p>
        <ul>
            <li>WhatsApp: (43) 99944-0016</li>
            <li>Email: bpruralparana@gmail.com</li>
            <li>Telefone: (43) 3348-1122</li>
        </ul>
        <div class="redes-sociais">
            <a href="#" target="_blank">Facebook</a>
            <a href="#" target="_blank">Instagram</a>
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
