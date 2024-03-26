<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Livros</title>
</head>
<body>
    <h1>Pesquisar Livros</h1>
    <form action="pesquisarLivro.php" method="post">
        <label for="criterio">Escolha o critério de pesquisa:</label>
        <select name="criterio" id="criterio">
            <option value="nome">Nome</option>
            <option value="id">ID</option>
            <option value="genero">Gênero</option>
            <option value="autor">Autor</option>
        </select>
        <br>
        <label for="termo">Digite o termo de pesquisa:</label>
        <input type="text" name="termo" id="termo">
        <br>
        <input type="submit" value="Pesquisar">
    </form>
</body>
</html>
