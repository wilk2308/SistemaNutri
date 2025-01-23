<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Localizações</h1>

    <a href="/locations/create" class="btn btn-primary mb-3">Adicionar Localização</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
                <tr>
                    <td><?= $location['id'] ?></td>
                    <td><?= $location['name'] ?></td>
                    <td>
                        <a href="/locations/edit/<?= $location['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/locations/delete/<?= $location['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
