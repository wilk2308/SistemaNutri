<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Inventário do Escritório</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/items/create" class="btn btn-primary mb-3">Cadastrar Novo Item</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Localização</th>
                <th>Quantidade</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['category'] ?></td>
                    <td><?= $item['location_id'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= ucfirst($item['status']) ?></td>
                    <td>
                        <a href="/items/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/items/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
