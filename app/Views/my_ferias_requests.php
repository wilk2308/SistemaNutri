<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minhas Solicitações de Férias</title>
</head>
<body>
    <h1>Minhas Solicitações de Férias</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request['id'] ?></td>
                    <td><?= $request['start_date'] ?></td>
                    <td><?= $request['end_date'] ?></td>
                    <td><?= $request['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
