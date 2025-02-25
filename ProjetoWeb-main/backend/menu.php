<?php
include 'bd.php';

$sql = mysqli_query($strcon, "SELECT * FROM usuarios") or die(
    mysqli_error($cx) //caso haja um erro na consulta
    );
$aux = mysqli_fetch_assoc($sql)
//end if ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BP Rural</title>
    <link rel="stylesheet" href="..\style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo, <?php echo $aux['nome']; ?>!</h1>
        <nav>
            <ul>
                <li><a href="cad_usuarios.php">Cadastrar Usuário</a></li>
                <li><a href="cad_grupos.php">Cadastrar Grupo</a></li>
                <li><a href="cad_produtos.php">Cadastrar Produto</a></li>
                <li><a href="del_usuarios.php">Excluir Usuário</a></li>
                <li><a href="del_grupos.php">Excluir Grupo</a></li>
                <li><a href="del_produtos.php">Excluir Produto</a></li>
                <li><a href="edit_produtos.php">Editar Produto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Painel de Controle</h2>
        <p>Selecione uma das opções acima para gerenciar o sistema.</p>

        <!-- Seção de Resumo -->
        <section class="resumo">
            <h3>Relatórios</h3>
            <div class="cards">
                <div class="card">
                    <a href="rel_usuarios.php">Usuários</a>
                </div>
                <div class="card">
                    <a href="rel_grupos.php">Grupos</a>
                </div>
                <div class="card">
                    <a href="rel_produtos.php">Produtos</a>
                </div>
            </div>
        </section>
    <a href="..\login.html">Sair</a>
    </main>

    <footer>
        <p>&copy; 2025 BP Rural Produtos Agropecuários. Todos os direitos reservados.</p>
    </footer>
</body>
</html>