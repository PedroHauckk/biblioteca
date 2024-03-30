<?php
function alterarLivro($idLivro, $novoNome, $novoAutor, $novoGenero, $novaClassificacao) {
    // Configurações de conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";
    $PORT = "3306";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname, $PORT);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Preparar a consulta SQL para atualizar os dados do livro
    $sql = "UPDATE Livros SET nome = ?, autor = ?, descricao = ?, classificacao = ? WHERE id = ?";

    // Preparar e executar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $novoNome, $novoAutor, $novaDescricao, $novaClassificacao, $idLivro);
    $stmt->execute();

    // Verificar se a atualização foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        echo "Dados do livro atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar dados do livro: " . $conn->error;
    }

    // Fechar declaração e conexão
    $stmt->close();
    $conn->close();
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $idLivro = $_POST["idLivro"];
    $novoNome = $_POST["novoNome"];
    $novoAutor = $_POST["novoAutor"];
    $novaDescricao = $_POST["novaDescricao"];
    $novaClassificacao = $_POST["novaClassificacao"];

    // Chamar a função para alterar os dados do livro
    alterarLivro($idLivro, $novoNome, $novoAutor, $novaDescricao, $novaClassificacao);
}
?>
