<?= $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Título da Página -->
    <div class="text-center my-4">
        <h1 class="display-6">Pacientes</h1>
        <p class="text-muted">Gerencie facilmente as informações nutricionais dos seus pacientes.</p>
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
                        <th>Gênero</th>
                        <th>Idade</th>
                        <th>Altura</th>
                        <th>Peso Inicial</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de Linha - Isso será dinâmico no futuro -->
                    <tr>
                        <td>1</td>
                        <td>Thaynara Milena</td>
                        <td>Feminino</td>
                        <td>27 anos</td>
                        <td>1,53 m</td>
                        <td>82,0 kg</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Ver Dados</a>
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
            <form id="patient-form" method="POST" action="/paciente/salvar">
                <div class="mb-3">
                    <label for="patient-name" class="form-label">Nome:</label>
                    <input type="text" id="patient-name" name="patient_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="patient-gender" class="form-label">Gênero:</label>
                    <select id="patient-gender" name="patient_gender" class="form-select" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="patient-birthdate" class="form-label">Data de Nascimento:</label>
                    <input type="date" id="patient-birthdate" name="patient_birthdate" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="patient-contact" class="form-label">Contato (telefone ou e-mail):</label>
                    <input type="text" id="patient-contact" name="patient_contact" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="patient-height" class="form-label">Altura (m):</label>
                    <input type="text" id="patient-height" name="patient_height" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="patient-initial-weight" class="form-label">Peso Inicial (kg):</label>
                    <input type="text" id="patient-initial-weight" name="patient_initial_weight" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="patient-notes" class="form-label">Notas Adicionais:</label>
                    <textarea id="patient-notes" name="patient_notes" rows="3" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Salvar Paciente</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
