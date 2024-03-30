<?php
function deletarLivro($idLivro) {
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

    // Preparar a consulta SQL para deletar o livro
    $sql = "DELETE FROM Livros WHERE id = ?";

    // Preparar e executar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idLivro);
    $stmt->execute();

    // Verificar se a exclusão foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        echo "Livro deletado com sucesso.";
    } else {
        echo "Erro ao deletar livro: " . $conn->error;
    }

    // Fechar declaração e conexão
    $stmt->close();
    $conn->close();
}

// Verificar se o ID do livro foi fornecido via POST
if (isset($_POST['idLivro'])) {
    $idLivro = $_POST['idLivro'];
    deletarLivro($idLivro);
}
?>
