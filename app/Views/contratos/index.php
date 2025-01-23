<?= $this->extend('master'); ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Contratos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Gerenciador de Contratos</h1>

<?php
$user = session()->get('user');
?>


    <a href="/contratos/criar" class="btn btn-primary mb-3">+ Novo Contrato</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="get" action="/contratos" class="mb-4">
        <div class="row">
        <div class="col-md-3">
    <select name="area" class="form-control">
        <option value="">Filtrar por Área</option>
        <option value="Direito Previdenciário" <?= $areaFilter === 'Direito Previdenciário' ? 'selected' : '' ?>>Direito Previdenciário</option>
        <option value="Direito Civil" <?= $areaFilter === 'Direito Civil' ? 'selected' : '' ?>>Direito Civil</option>
        <option value="Direito Empresarial" <?= $areaFilter === 'Direito Empresarial' ? 'selected' : '' ?>>Direito Empresarial</option>
        <option value="Direito Trabalhista" <?= $areaFilter === 'Direito Trabalhista' ? 'selected' : '' ?>>Direito Trabalhista</option>
        <option value="Relações Governamentais" <?= $areaFilter === 'Relações Governamentais' ? 'selected' : '' ?>>Relações Governamentais</option>
    </select>
</div>
<div class="col-md-3">
    <select name="materia" class="form-control">
        <option value="">Filtrar por Matéria</option>
        <?php if (!empty($materiaOptions)): ?>
            <?php foreach ($materiaOptions as $materia): ?>
                <option value="<?= $materia ?>" <?= $materiaFilter === $materia ? 'selected' : '' ?>><?= $materia ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>

            <div class="col-md-3">
                <input type="text" name="nome_cliente" class="form-control" placeholder="Filtrar por Nome do Cliente" value="<?= $nomeClienteFilter ?>">
            </div>
            <div class="col-md-3">
                <input type="date" name="data_fechamento" class="form-control" value="<?= $dataFechamentoFilter ?>">
            </div>
            <div class="col-md-3">
                <input type="text" name="numero_contrato" class="form-control" placeholder="Filtrar por Número do Contrato" value="<?= $numeroContratoFilter ?>">
            </div>
            <div class="col-md-2 mt-2">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Número do Contrato</th>
                <th>Nome do Cliente</th>
                <th>Data de Fechamento</th>
                <th>Matéria</th>
                <th>Área</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contratos as $contrato): ?>
                <tr>
                    <td><?= $contrato['numero_contrato'] ?></td>
                    <td><?= $contrato['nome_cliente'] ?></td>
                    <td><?= date('d/m/Y', strtotime($contrato['data_fechamento'])) ?></td>
                    <td><?= $contrato['materia'] ?></td>
                    <td><?= $contrato['area'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>


<?= $this->endSection() ?>