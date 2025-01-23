<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metas</title>
</head>
<body>
    <h1>Metas</h1>
    <a href="/metas/create">Criar Nova Meta</a>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Meta</th>
                <th>Atual</th>
                <th>Setor</th>
                <th>Observações</th>
                <th>Objetivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($metas as $meta): ?>
                <tr>
                    <td><?= $meta['titulo'] ?></td>
                    <td><?= $meta['meta'] ?></td>
                    <td><?= $meta['atual'] ?></td>
                    <td><?= $meta['setor'] ?></td>
                    <td><?= $meta['observacoes'] ?></td>
                    <td><?= $meta['objetivo'] ?></td>
                    <td>
                        <a href="/metas/edit/<?= $meta['id'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
