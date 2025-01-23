<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Adicionar Novo Usuário</h1>

    <form action="<?= site_url('usuarios/novo') ?>" method="post">
    <div class="form-group">
            <label for="employee_id">ID do Funcionário</label>
            <input type="text" name="employee_id" class="form-control" value="<?= esc($nextEmployeeId) ?>" readonly>
        </div>
        <div class="form-group">
            <label for="username">Nome de Usuário</label>
            <input type="text" name="username" class="form-control" placeholder="Digite o nome de usuário" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Digite o email" required>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" placeholder="Digite a senha" required>
        </div>
        
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="<?= site_url('users') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection() ?>
