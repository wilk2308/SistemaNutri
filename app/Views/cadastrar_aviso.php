<?= $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4">Cadastrar Aviso do Financeiro</h1>

    <!-- Formulário de Cadastro -->
    <form action="/financeiro/salvarAviso" method="post">
        <?= csrf_field() ?> <!-- Proteção contra CSRF -->
        
        <div class="form-group mb-3">
            <label for="titulo" class="form-label">Título do Aviso</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do aviso" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Digite os detalhes do aviso" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Salvar Aviso</button>
    </form>
</div>

<?= $this->endSection() ?>
