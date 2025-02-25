<?php

session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}


include 'bd.php'; // Conexão com o banco

// Verifica se o arquivo foi enviado corretamente
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $diretorio = 'uploads/'; // Pasta onde as imagens serão salvas

    // Gera um nome único para a imagem
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novo_nome = uniqid() . '.' . $extensao;

    // Caminho completo da imagem
    $caminho_imagem = $diretorio . $novo_nome;

    // Move o arquivo para a pasta de uploads
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_imagem)) {
        echo "Upload realizado com sucesso!<br>";
    } else {
        echo "Erro ao salvar a imagem.<br>";
        exit;
    }
} else {
    echo "Nenhuma imagem enviada.<br>";
    $caminho_imagem = ""; // Caso o usuário não envie uma imagem
}

// Captura os dados do formulário (sanitizando para evitar problemas)
$nome = trim($_POST['txtnome']);
$preco = trim($_POST['txtpreco']);
$desconto = trim($_POST['txtdesconto']);
$descricao = trim($_POST['txtdescricao']);
$situacao = trim($_POST['cbosituacao']);
$fornecedor = trim($_POST['txtfornecedor']);
$grupo = trim($_POST['cbogrupo']);

echo "Grupo ID recebido: " . htmlspecialchars($grupo) . "<br>";

$grupo = isset($_POST['cbogrupo']) ? intval($_POST['cbogrupo']) : 0;



if ($grupo <= 0) {
    die("Erro: Grupo inválido.");
}

// Prepara a query SQL
$sql = "INSERT INTO produtos (nome, preco, desconto, descricao, situacao, imagem, fornecedor, grupo_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $strcon->prepare($sql);
$stmt->bind_param("ssdssssi", $nome, $preco, $desconto, $descricao, $situacao, $caminho_imagem, $fornecedor, $grupo);

// Executa a query
if ($stmt->execute()) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
mysqli_close($strcon);
?>
