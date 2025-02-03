<?= $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Título da Página -->
    <div class="text-center my-4">
        <h1 class="display-6">Cadastro de Acompanhamento Nutricional</h1>
        <p class="text-muted">Registre e gerencie os dados nutricionais detalhados do paciente.</p>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Adicionar Novo Acompanhamento Nutricional
        </div>
        <div class="card-body">
            <form id="nutrition-form" method="POST" action="/paciente/salvar">
                <div class="mb-3">
                    <label for="patient-name" class="form-label">Nome do Paciente:</label>
                    <input type="text" id="patient-name" name="patient_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Idade:</label>
                    <input type="number" id="age" name="age" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Peso Atual (kg):</label>
                    <input type="text" id="weight" name="weight" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="imc" class="form-label">IMC Atual:</label>
                    <input type="text" id="imc" name="imc" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="classification" class="form-label">Classificação:</label>
                    <select id="classification" name="classification" class="form-select" required>
                        <option value="Normal">Normal</option>
                        <option value="Sobrepeso">Sobrepeso</option>
                        <option value="Obesidade Grau I">Obesidade Grau I</option>
                        <option value="Obesidade Grau II">Obesidade Grau II</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="medications" class="form-label">Medicamentos em Uso:</label>
                    <textarea id="medications" name="medications" rows="3" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="bio-tests" class="form-label">Exames Bioquímicos Recentes:</label>
                    <textarea id="bio-tests" name="bio_tests" rows="4" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="clinical-complaints" class="form-label">Queixas Clínicas:</label>
                    <textarea id="clinical-complaints" name="clinical_complaints" rows="4" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="diet-plan" class="form-label">Plano Alimentar:</label>
                    <textarea id="diet-plan" name="diet_plan" rows="4" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="goals" class="form-label">Objetivos:</label>
                    <textarea id="goals" name="goals" rows="3" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="strategies" class="form-label">Estratégias:</label>
                    <textarea id="strategies" name="strategies" rows="3" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="creation-date" class="form-label">Data de Cadastro:</label>
                    <input type="date" id="creation-date" name="creation_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Salvar Acompanhamento</button>
            </form>
        </div>
    </div>

    <!-- Lista de Acompanhamentos Cadastrados -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Acompanhamentos Cadastrados
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Paciente</th>
                        <th>Peso Atual</th>
                        <th>IMC</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Linhas de exemplo - Isso será dinâmico -->
                    <tr>
                        <td>1</td>
                        <td>Thaynara Milena</td>
                        <td>82,0 kg</td>
                        <td>35 kg/m²</td>
                        <td>22/01/2025</td>
                        <td>
                            <a href="/paciente" class="btn btn-sm btn-info">Ver</a>
                            <a href="#" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
