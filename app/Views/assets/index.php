<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">


    <h1>Inventário</h1>
    <div class="mb-3">
        <a href="/inventario/create" class="btn btn-primary">Cadastrar Novo</a>
        <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#importModal">Importar CSV</a>
        <a href="/validate-barcode" class="btn btn-info">Checar Código de Barras</a>
    </div>

    <?php
$user = session()->get('user');

if ($user !== null && isset($user['username'])): ?>
    <div class="text-center">
        <span class="d-block text-gray-600 small">
            Olá queridissimo(a), <?= esc($user['username']); ?>
        </span>
        <!-- Link de Logout -->
       
    </div>
<?php else: ?>
    <div class="text-center">
        <span class="d-block text-gray-600 small">Olá, Visitante</span>
    </div>
<?php endif; ?>
<br>

    <!-- Formulário de Filtro -->
    <form method="get" action="/inventario" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="patrimonio" class="form-control" placeholder="Filtrar por Patrimônio" value="<?= esc($filters['patrimonio'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <input type="text" name="descricao" class="form-control" placeholder="Filtrar por Descrição" value="<?= esc($filters['descricao'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="/inventario" class="btn btn-secondary">Limpar</a>
            </div>
        </div>
    </form>

    <!-- Dashboards -->
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total de Itens</div>
                <div class="card-body">
                    <h5 class="card-title"><?= count($assets) ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Itens Checados</div>
                <div class="card-body">
                    <h5 class="card-title"><?= count(array_filter($assets, fn($asset) => $asset['checked'] == 1)) ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Itens Não Checados</div>
                <div class="card-body">
                    <h5 class="card-title"><?= count(array_filter($assets, fn($asset) => $asset['checked'] == 0)) ?></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela Responsiva -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Patrimônio</th>
                    <th>Descrição</th>
                    <th>Local</th>
                    <th>Condição</th>
                    <th>Responsável</th>
                    <th>Valor (R$)</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assets as $asset): ?>
                    <tr class="<?= $asset['checked'] ? 'table-success' : '' ?>" id="row-<?= $asset['id'] ?>">
                        <td><?= $asset['patrimonio'] ?></td>
                        <td><?= $asset['descricao'] ?></td>
                        <td><?= $asset['local'] ?></td>
                        <td><?= $asset['condicao'] ?></td>
                        <td><?= $asset['responsavel'] ?></td>
                        <td><?= number_format($asset['valor'], 2, ',', '.') ?></td>
                        <td>
                            <button 
                                class="btn btn-sm <?= $asset['checked'] ? 'btn-success' : 'btn-secondary' ?>" 
                                onclick="toggleCheck(<?= $asset['id'] ?>)">
                                <?= $asset['checked'] ? 'Checado' : 'Não Checado' ?>
                            </button>
                        </td>
                        <td>
                            <a href="/inventario/edit/<?= $asset['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/inventario/delete/<?= $asset['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleCheck(id) {
        fetch(`/inventario/toggle-check/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ _method: 'PATCH' })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const button = document.querySelector(`#row-${id} button`);
                button.textContent = data.checked ? 'Checado' : 'Não Checado';
                button.className = `btn btn-sm ${data.checked ? 'btn-success' : 'btn-secondary'}`;
                const row = document.getElementById(`row-${id}`);
                row.className = data.checked ? 'table-success' : '';
            } else {
                alert('Erro ao atualizar o status.');
            }
        })
        .catch(error => console.error('Erro:', error));
    }
</script>
</body>
</html>

<?= $this->endSection() ?>
