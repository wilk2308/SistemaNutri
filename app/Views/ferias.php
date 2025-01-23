<?= $this->extend('master'); ?>

<?= $this->section('content') ?>

<?php
$user = session()->get('user');
?>

<div class="container-fluid">
    <!-- Título da Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Solicitação de Férias</h1>
    </div>

    <!-- Formulário de Solicitação de Férias -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Verificar e Solicitar Férias</h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('ferias/submit') ?>" method="post" id="feriasForm">
                        <div class="form-group">
                            <label for="employeeSelect">Selecione seu nome:</label>
                            <select id="employeeSelect" name="employee_id" class="form-control" required>
                                <?php foreach($funcionarios as $funcionario): ?>
                                    <option value="<?= $funcionario['id']; ?>" data-hire-date="<?= $funcionario['data_contratacao']; ?>">
                                        <?= $funcionario['nome']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Data de Início:</label>
                            <input type="date" id="startDate" name="start_date" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="endDate">Data de Término:</label>
                            <input type="date" id="endDate" name="end_date" class="form-control" disabled>
                        </div>
                        <div id="eligibilityMessage" class="alert alert-danger" style="display:none;">
                            Você não é elegível para solicitar férias no momento.
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" disabled>Enviar Solicitação</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Seção de Informações sobre Férias com Estilo Azul Claro -->
        <div class="col-lg-6">
            <div class="alert alert-info" style="background-color: #e3f7ff; color: #064273; border-left: 5px solid #007bff; padding: 15px; border-radius: 5px;">
                <h4 class="font-weight-bold">Informações sobre Férias</h4>
                <p style="margin-bottom: 8px;">
                    <strong>Período de Concessão:</strong> As férias deverão ser concedidas pela empresa em até 12 meses após o término do período aquisitivo, preferencialmente em um único período. Em comum acordo, no entanto, é possível fracionar as férias em até três períodos, sendo que:
                </p>
                <ul>
                    <li>Um dos períodos deve ter no mínimo 14 dias corridos.</li>
                    <li>Os demais períodos não podem ser inferiores a 5 dias corridos cada (Art. 134, §1º).</li>
                </ul>
                <p style="margin-bottom: 8px;">
                    <strong>Início das Férias:</strong> Conforme o §3º do Art. 134, o início das férias não poderá ocorrer nos dois dias que antecedem um feriado ou dia de repouso semanal remunerado.
                </p>
                <p style="margin-bottom: 8px;">
                    <strong>Antecedência na Concessão:</strong> As férias serão comunicadas com antecedência mínima de 30 dias. Ao receber o aviso, o colaborador deve assinar o recibo e apresentar a Carteira de Trabalho para anotação (quando aplicável) ou confirmar o registro digital no sistema.
                </p>
                <p style="margin-bottom: 8px;">
                    <strong>Pagamentos em Caso de Atraso na Concessão:</strong> Caso as férias não sejam concedidas dentro do prazo, a empresa deverá remunerá-las em dobro (Art. 137).
                </p>
                <p style="margin-bottom: 0;">
                    <strong>Restrições Durante as Férias:</strong> Durante o período de férias, não é permitido prestar serviços a outro empregador, exceto se houver um contrato previamente autorizado (Art. 138).
                </p>

                
            </div>
        </div>
    </div>
</div>


   


<!-- Script para Verificação -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const employeeSelect = document.getElementById('employeeSelect');
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('endDate');
    const submitButton = document.querySelector('button[type="submit"]');
    const eligibilityMessage = document.getElementById('eligibilityMessage');

    // Verificar elegibilidade quando selecionar funcionário
    employeeSelect.addEventListener('change', function() {
        const hireDate = new Date(employeeSelect.options[employeeSelect.selectedIndex].dataset.hireDate);
        const currentDate = new Date();
        
        // Calcular diferença em anos para determinar elegibilidade
        const yearsWorked = currentDate.getFullYear() - hireDate.getFullYear();

        if (yearsWorked >= 1) {
            startDate.disabled = false;
            endDate.disabled = false;
            submitButton.disabled = false;
            eligibilityMessage.style.display = 'none';
        } else {
            startDate.disabled = true;
            endDate.disabled = true;
            submitButton.disabled = true;
            eligibilityMessage.style.display = 'block';
        }
    });
});
</script>

<?= $this->endSection() ?>
