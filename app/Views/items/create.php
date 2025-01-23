<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Cadastrar Novo Item</h1>

    <form action="/items/store" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Nome do Item</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="col-md-6">
            <label for="category" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="category" id="category" required>
        </div>
        <div class="col-md-6">
            <label for="location_id" class="form-label">Localização</label>
            <select class="form-select" name="location_id" id="location_id" required>
                <?php foreach ($locations as $location): ?>
                    <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantity" id="quantity" required>
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status" required>
                <option value="ativo">Ativo</option>
                <option value="manutenção">Manutenção</option>
                <option value="descartado">Descartado</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/items" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
