<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Título da Página -->
    <div class="text-center my-4">
        <h1 class="display-6">Planos Alimentares</h1>
        <p class="text-muted">Gerencie os planos alimentares de forma organizada e eficiente.</p>
    </div>

    <!-- Lista de Planos Alimentares -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Planos Alimentares
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Paciente</th>
                        <th>Plano Alimentar</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de Linha -->
                    <tr>
                        <td>1</td>
                        <td>Maria Silva</td>
                        <td>Plano Low Carb</td>
                        <td>22/01/2025</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Ver</a>
                            <a href="#" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Adicionar Novo Plano Alimentar -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Adicionar Novo Plano Alimentar
        </div>
        <div class="card-body">
            <form id="plan-form">
                <div class="mb-3">
                    <label for="patient-name" class="form-label">Nome do Paciente:</label>
                    <input type="text" id="patient-name" name="patient-name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="plan-details" class="form-label">Detalhes do Plano Alimentar:</label>
                    <textarea id="plan-details" name="plan-details" rows="4" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="creation-date" class="form-label">Data de Criação:</label>
                    <input type="date" id="creation-date" name="creation-date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Salvar Plano</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>