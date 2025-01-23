<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meta</title>
</head>
<body>
    <h1>Editar Meta</h1>
    <form action="/metas/update/<?= $meta['id'] ?>" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= $meta['titulo'] ?>" required><br><br>

        <label for="meta">Meta:</label>
        <input type="number" id="meta" name="meta" value="<?= $meta['meta'] ?>" required><br><br>

        <label for="atual">Atual:</label>
        <input type="number" id="atual" name="atual" value="<?= $meta['atual'] ?>" required><br><br>

        <label for="setor">Setor:</label>
        <input type="text" id="setor" name="setor" value="<?= $meta['setor'] ?>" required><br><br>

        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes"><?= $meta['observacoes'] ?></textarea><br><br>

        <label for="objetivo">Objetivo:</label>
        <textarea id="objetivo" name="obejetivo"><?= $meta['objetivo'] ?></textarea><br><br>

        <label for="usuario_id">ID do Usuário:</label>
        <input type="number" id="usuario_id" name="usuario_id" value="<?= $meta['usuario_id'] ?>" required><br><br>

        <button type="submit">Atualizar Meta</button>
    </form>
</body>
</html>
