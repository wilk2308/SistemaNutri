<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <!-- Menu Lateral -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/paciente/dieta">
                            <i class="fas fa-utensils"></i> Minha Dieta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente">
                            <i class="fas fa-heartbeat"></i> Acompanhamento Nutricional
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente/lembretes">
                            <i class="fas fa-bell"></i> Lembretes de Saúde
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Informações da Dieta -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Informações da Dieta Personalizada
                </div>
                <div class="card-body">
                    <p><strong>Nome do Paciente:</strong> Thaynara Milena</p>
                    <p><strong>Peso Atual:</strong> 82,0 kg</p>
                    <p><strong>IMC Atual:</strong> 35 kg/m² (Obesidade Grau II)</p>
                    <p><strong>Objetivo:</strong> Reduzir sinais e sintomas, melhorar estilo de vida e perder peso gradualmente.</p>
                </div>
            </div>

            <!-- Refeições do Dia -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    Plano Alimentar do Dia
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>05h30:</strong> 250 ml de água em temperatura ambiente</li>
                        <li class="list-group-item"><strong>06h00:</strong> 1 xícara de chá de hibisco, maçã, canela e laranja</li>
                        <li class="list-group-item"><strong>09h30:</strong> 4 colheres de sopa de cuscuz com 2 ovos, mamão ou banana e chia</li>
                        <li class="list-group-item"><strong>13h30 (Almoço):</strong> 3 colheres de arroz, filé de frango grelhado e salada</li>
                        <li class="list-group-item"><strong>15h00:</strong> Suco pré-treino (beterraba + laranja)</li>
                        <li class="list-group-item"><strong>16h00:</strong> Tapioca com frango desfiado ou ovos</li>
                        <li class="list-group-item"><strong>19h00:</strong> Jantar similar ao almoço, seguido de chá calmante</li>
                    </ul>
                </div>
            </div>

            <!-- Progresso do Paciente -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    Progresso do Paciente
                </div>
                <div class="card-body">
                    <canvas id="progressChart"></canvas>
                    <p class="text-muted mt-3">Progresso atual: 75% do plano concluído.</p>
                </div>
            </div>

            <!-- Atualizações do Nutricionista -->
            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    Atualizações Recentes do Nutricionista
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Adicionar salada de quinoa ao plano alimentar.</li>
                        <li class="list-group-item">Ajustar porção de proteína para +50g de frango no almoço.</li>
                        <li class="list-group-item">Aumentar ingestão de água para 2,5L/dia.</li>
                    </ul>
                </div>
            </div>

            <!-- Lembretes de Saúde -->
            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    Lembretes de Saúde
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Beba água:</strong> Ativar lembretes no celular para garantir o consumo.</li>
                        <li><strong>Atividade física:</strong> Exercite-se pelo menos 4x na semana.</li>
                        <li><strong>Sono regulado:</strong> Jantar cedo e dormir até as 22h para descansar adequadamente.</li>
                    </ul>
                </div>
            </div>

            <!-- Botão para Consultar Nutricionista -->
            <div class="text-center mt-4">
                <a href="/paciente/mensagens" class="btn btn-primary btn-lg">
                    Consultar Nutricionista
                </a>
            </div>
        </main>
    </div>
</div>

<!-- Adicionando Script para o Gráfico -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('progressChart').getContext('2d');
    const progressChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
            datasets: [{
                label: 'Progresso de Peso (kg)',
                data: [82, 80.5, 79.2, 78], // Ajustar conforme os dados reais
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    title: {
                        display: true,
                        text: 'Peso (kg)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Semanas'
                    }
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>
