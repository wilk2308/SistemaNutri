<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Cadastrar Novo Patrimônio</h1>

    <form action="/inventario/store" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="patrimonio" class="form-label">Patrimônio</label>
            <input type="text" name="patrimonio" id="patrimonio" class="form-control" placeholder="Ex: 12345" required>
        </div>
        <div class="col-md-6">
            <label for="descricao" class="form-label">Descrição do Bem</label>
            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Ex: Computador Dell" required>
        </div>
        <div class="col-md-6">
            <label for="local" class="form-label">Local</label>
            <input type="text" name="local" id="local" class="form-control" placeholder="Ex: Sala TI" required>
        </div>
        <div class="col-md-6">
    <label for="valor" class="form-label">Valor (R$)</label>
    <input type="number" step="0.01" name="valor" id="valor" class="form-control" placeholder="Ex: 1200.50" required>
</div>

        <div class="col-md-6">
            <label for="condicao" class="form-label">Condição do Bem</label>
            <select name="condicao" id="condicao" class="form-select">
                <option value="Funcionando">Funcionando</option>
                <option value="Precisa de manutenção">Precisa de manutenção</option>
                <option value="Sucata">Sucata</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="responsavel" class="form-label">Responsável</label>
            <input type="text" name="responsavel" id="responsavel" class="form-control" placeholder="Ex: João da Silva" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/inventario" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
