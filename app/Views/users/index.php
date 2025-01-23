<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!-- Página de Usuários -->
<div class="container-fluid">
    <!-- Título da Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gerenciamento de Usuários</h1>
    </div>

    <div class="d-sm-flex justify-content-end mb-4">
    <a href="<?= site_url('usuarios/novo') ?>" class="btn btn-primary">
        <i class="fas fa-user-plus"></i> Adicionar Novo Usuário
    </a>
</div>


    </div>

    <!-- Lista de Usuários -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Usuários Cadastrados</h6>
                </div>
                <div class="card-body">
                    <!-- Tabela de Usuários -->
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID do Funcionário</th>
                                    <th>Nome de Usuário</th>
                                    <th>Email</th>
                                    <th>Data de Registro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= esc($usuario->employee_id) ?></td>
                <td><?= esc($usuario->username) ?></td> <!-- Acesso como objeto -->
                <td><?= esc($usuario->email) ?></td>
                <td><?= esc($usuario->created_at) ?></td>
                <td>
                    <a href="<?= site_url('usuarios/editar/'.$usuario->id) ?>" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="<?= site_url('usuarios/excluir/'.$usuario->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">Nenhum usuário encontrado.</td>
        </tr>
    <?php endif; ?>
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
