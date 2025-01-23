<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Editar Grupo</h1>

    <form action="<?= site_url('grupos/editar/'.$grupo['id']) ?>" method="post">
        <div class="form-group">
            <label for="name">Nome do Grupo</label>
            <input type="text" name="name" class="form-control" value="<?= esc($grupo['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" class="form-control" value="<?= esc($grupo['description']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="<?= site_url('grupos') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection() ?>
