<?php


session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../login.html'); // Redireciona para a página de login
    exit();
}


include 'bd.php'; // Conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = intval($_POST['produto_id']);
    $nome = trim($_POST['txtnome']);
    $preco = trim($_POST['txtpreco']);
    $desconto = trim($_POST['txtdesconto']);
    $descricao = trim($_POST['txtdescricao']);
    $situacao = trim($_POST['cbosituacao']);
    $promocao = trim($_POST['cbopromocao']);
    $fornecedor = trim($_POST['txtfornecedor']);

    // Tratamento da imagem
    if (!empty($_FILES['foto']['name'])) {
        $diretorio = 'uploads/';
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $novo_nome = uniqid() . '.' . $extensao;
        $caminho_imagem = $diretorio . $novo_nome;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_imagem)) {
            $sql = "UPDATE produtos SET nome=?, preco=?, desconto=?, descricao=?, situacao=?, promocao=?, imagem=?, fornecedor=? WHERE id=?";
            $stmt = $strcon->prepare($sql);
            $stmt->bind_param("ssdsssssi", $nome, $preco, $desconto, $descricao, $situacao, $promocao, $caminho_imagem, $fornecedor, $produto_id);
        } else {
            die("Erro ao salvar a nova imagem.");
        }
    } else {
        // Atualização sem modificar a imagem
        $sql = "UPDATE produtos SET nome=?, preco=?, desconto=?, descricao=?, situacao=?, promocao=?, fornecedor=? WHERE id=?";
        $stmt = $strcon->prepare($sql);
        $stmt->bind_param("ssdssssi", $nome, $preco, $desconto, $descricao, $situacao, $promocao, $fornecedor, $produto_id);
    }

    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($strcon);
}
?>
