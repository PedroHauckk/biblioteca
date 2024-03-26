<?php
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

// Processar o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter critério e termo de pesquisa do formulário
    $criterio = $_POST["criterio"];
    $termo = $_POST["termo"];

    // Preparar a consulta de acordo com o critério escolhido
    switch ($criterio) {
        case "nome":
            $sql = "SELECT * FROM Livros WHERE nome LIKE '%$termo%'";
            break;
        case "id":
            $sql = "SELECT * FROM Livros WHERE id = $termo";
            break;
        case "genero":
            $sql = "SELECT * FROM Livros WHERE genero LIKE '%$termo%'";
            break;
        case "autor":
            $sql = "SELECT * FROM Livros WHERE autor LIKE '%$termo%'";
            break;
        default:
            echo "Critério de pesquisa inválido.";
            exit;
    }

    // Executar a consulta
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os resultados
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Nome: " . $row["nome"] . "<br>";
            echo "Autor: " . $row["autor"] . "<br>";
            echo "Descrição: " . $row["descricao"] . "<br>";
            echo "Valor: " . $row["valor"] . "<br>";
            echo "Sinopse: " . $row["sinopse"] . "<br>";
            echo "Classificação: " . $row["classificacao"] . "<br><br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    // Fechar a conexão
    $conn->close();
}
?>
