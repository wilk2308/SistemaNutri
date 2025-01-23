<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Meta</title>
</head>
<body>
    <h1>Criar Nova Meta</h1>
    <form action="/metas/store" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="meta">Meta:</label>
        <input type="number" id="meta" name="meta" required><br><br>

        <label for="atual">Atual:</label>
        <input type="number" id="atual" name="atual" required><br><br>

        <label for="setor">Setor:</label>
        <input type="text" id="setor" name="setor" required><br><br>

        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes"></textarea><br><br>

        <label for="objetivo">Objetivo:</label>
        <textarea id="objetivo" name="objetivo"></textarea><br><br>

        <label for="usuario_id">ID do Usuário:</label>
        <input type="number" id="usuario_id" name="usuario_id" required><br><br>

        <button type="submit">Salvar Meta</button>
    </form>
</body>
</html>
