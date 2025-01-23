<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!-- Página de Aprovação de Solicitações de Férias -->
<div class="container-fluid">
    <!-- Título da Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aprovação de Solicitações de Férias</h1>
    </div>

<?php
$user = session()->get('user');
?>
    <!-- Mensagens de Sucesso ou Erro -->
    <?php if (session()->has('message')): ?>
        <div class="alert alert-success">
            <?= session('message') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <!-- Tabela de Solicitações -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Solicitações de Férias</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Funcionário</th>
                                    <th>Data de Início</th>
                                    <th>Data de Término</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($requests as $request): ?>
                                    <tr>
                                        <td><?= esc($request['id']) ?></td>
                                        <td><?= esc($request['funcionario_nome']) ?></td>
                                        <td><?= esc($request['start_date']) ?></td>
                                        <td><?= esc($request['end_date']) ?></td>
                                        <td><?= esc($request['status']) ?></td>
                                        <td>
                                            <form action="<?= site_url('ferias/approve') ?>" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= esc($request['id']) ?>">
                                                <input type="hidden" name="status" value="aprovado">
                                                <button type="submit" class="btn btn-sm btn-success">Aprovar</button>
                                            </form>
                                            <form action="<?= site_url('ferias/reject') ?>" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= esc($request['id']) ?>">
                                                <input type="hidden" name="status" value="rejeitado">
                                                <button type="submit" class="btn btn-sm btn-danger">Rejeitar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
