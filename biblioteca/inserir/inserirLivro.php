<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processar o formulário se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST["nome"];
    $autor = $_POST["autor"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $classificacao = $_POST["classificacao"];

    // Preparar a consulta SQL para inserir o livro
    $sql = "INSERT INTO Livros (nome, autor, descricao, valor, classificacao) VALUES (?, ?, ?, ?, ?)";

    // Preparar e executar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdd", $nome, $autor, $descricao, $valor, $classificacao);
    $stmt->execute();

    // Verificar se a inserção foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        echo "Livro inserido com sucesso.";
    } else {
        echo "Erro ao inserir livro: " . $conn->error;
    }

    // Fechar declaração e conexão
    $stmt->close();
    $conn->close();
}
?>
