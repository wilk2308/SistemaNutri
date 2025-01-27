<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Título da Página -->
    <div class="text-center my-4">
        <h1 class="display-6">Pacientes</h1>
        <p class="text-muted">Gerencie facilmente as informações dos seus pacientes.</p>
    </div>

    <!-- Lista de Pacientes -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Lista de Pacientes
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Contato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de Linha -->
                    <tr>
                        <td>1</td>
                        <td>Maria Silva</td>
                        <td>10/05/1985</td>
                        <td>(11) 91234-5678</td>
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

    <!-- Adicionar Paciente -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Adicionar Novo Paciente
        </div>
        <div class="card-body">
            <form id="patient-form">
                <div class="mb-3">
                    <label for="patient-name" class="form-label">Nome:</label>
                    <input type="text" id="patient-name" name="patient-name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="patient-birthdate" class="form-label">Data de Nascimento:</label>
                    <input type="date" id="patient-birthdate" name="patient-birthdate" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="patient-contact" class="form-label">Contato:</label>
                    <input type="text" id="patient-contact" name="patient-contact" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Salvar Paciente</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
