<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!-- Página de Grupos -->
<div class="container-fluid">
    <!-- Título da Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gerenciamento de Grupos</h1>
    </div>
    <div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('grupos/novo') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Adicionar Novo Grupo
    </a>
</div>


    <!-- Tabela de Grupos -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Grupos Cadastrados</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome do Grupo</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($grupos)): ?>
                                    <?php foreach ($grupos as $grupo): ?>
                                        <tr>
                                            <td><?= esc($grupo['name']) ?></td>
                                            <td><?= esc($grupo['description']) ?></td>
                                            <td>
    <a href="<?= site_url('grupos/editar/'.$grupo['id']) ?>" class="btn btn-sm btn-warning">
        <i class="fas fa-edit"></i> Editar
    </a>
    <a href="<?= site_url('grupos/excluir/'.$grupo['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este grupo?')">
        <i class="fas fa-trash"></i> Excluir
    </a>
</td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Nenhum grupo encontrado.</td>
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
