<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!-- Página de Denúncias -->
<div class="container-fluid">
    <!-- Título da Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gerenciamento de Denúncias</h1>
    </div>

    <!-- Lista de Denúncias -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Denúncias Cadastradas</h6>
                </div>
                <div class="card-body">
                    <!-- Tabela de Denúncias -->
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Classificação</th>
                                    <th>Descrição</th>
                                    <th>Data de Submissão</th>
                                    <th>Gravidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($denuncias) && is_array($denuncias)): ?>
                                    <?php foreach ($denuncias as $denuncia): ?>
                                        <tr>
                                            <td><?= esc($denuncia['id']) ?></td>
                                            <td><?= esc($denuncia['classificacao']) ?></td>
                                            <td><?= esc($denuncia['descricao']) ?></td>
                                            <td><?= esc($denuncia['data_submissao']) ?></td>
                                            <td><?= esc($denuncia['gravidade']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhuma denúncia encontrada.</td>
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
