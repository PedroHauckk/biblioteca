<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
        }

        h2 {
            color: #343a40;
            margin-bottom: 30px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nome da Loja</h1>
        <h2>Escolha uma opção:</h2>
        <button onclick="window.location.href = 'pesquisar/htmlpesquisar.php';">Pesquisar</button>
        <button onclick="window.location.href = 'inserir/htmlinserir.php';">Inserir</button>
        <button onclick="window.location.href = 'alterar/htmlalterar.php';">Alterar</button>
        <button onclick="window.location.href = 'deletar/htmldeletar.php';">Deletar</button>
    </div>
</body>
</html>
