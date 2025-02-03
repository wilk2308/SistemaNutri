<?= $this->extend('master'); ?>

<?= $this->section('content') ?>

<!-- DASHBOARD -->
<div class="container-fluid">

    <!-- Título e Subtítulo -->
    <div class="text-center my-4">
        <h1 class="display-5 text-primary">Bem-vindo, Nutricionista!</h1>
        <p class="lead text-secondary">Gerencie o progresso nutricional dos seus pacientes e acompanhe suas metas.</p>
    </div>

    <!-- Cartões Principais -->
    <div class="row text-center mb-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-user-friends fa-2x text-info mb-3"></i>
                    <h5 class="card-title">Pacientes</h5>
                    <a href="/pacientes" class="btn btn-outline-info">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-utensils fa-2x text-warning mb-3"></i>
                    <h5 class="card-title">Planos Alimentares</h5>
                    <a href="/planos-alimentares" class="btn btn-outline-warning">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-2x text-primary mb-3"></i>
                    <h5 class="card-title">Relatórios</h5>
                    <a href="/relatorios" class="btn btn-outline-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos e Informações Gerais -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Desempenho dos Pacientes</div>
                <div class="card-body">
                    <canvas id="patientPerformanceChart" width="400" height="200"></canvas>
                    <p class="text-muted mt-3">Status geral baseado nos dados atuais de acompanhamento nutricional.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Relatórios Recentes</div>
                <div class="card-body">
                    <p>Acesse relatórios detalhados sobre o progresso dos pacientes e suas metas.</p>
                    <a href="/relatorios" class="btn btn-success">Ver Relatórios</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 pt-3 border-top">
        <p class="text-muted">&copy; 2025 Sistema Nutri Fernanda Amorim. <br>Vamos juntos construir o melhor estilo de vida dos seus pacientes!</p>
    </footer>
</div>

<!-- Adicionando Script para o Gráfico -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('patientPerformanceChart').getContext('2d');
    const patientPerformanceChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Atingiram a Meta', 'Em Progresso', 'Não Atingiram'],
            datasets: [{
                label: 'Desempenho Geral dos Pacientes',
                data: [45, 35, 20], // Exemplo: ajustar conforme os dados reais
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',  // Verde - Atingiram
                    'rgba(255, 206, 86, 0.6)',  // Amarelo - Em Progresso
                    'rgba(255, 99, 132, 0.6)'   // Vermelho - Não Atingiram
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>
