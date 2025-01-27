<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Menu Lateral -->
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/paciente/dieta">
                            <i class="fas fa-utensils"></i> Minha Dieta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente/planos">
                            <i class="fas fa-list-alt"></i> Planos Alimentares
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente/progresso">
                            <i class="fas fa-chart-line"></i> Relatórios de Progresso
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente/lembretes">
                            <i class="fas fa-bell"></i> Lembretes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente/mensagens">
                            <i class="fas fa-envelope"></i> Mensagens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/paciente/configuracoes">
                            <i class="fas fa-cogs"></i> Configurações
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Minha Dieta</h1>
            </div>

            <!-- Status da Dieta -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Status da Dieta
                </div>
                <div class="card-body">
                    <p>Seu progresso atual: <strong>75%</strong> do plano concluído.</p>
                    <p>Última atualização: <strong>22/01/2025</strong>.</p>
                    <p>Próxima meta: <strong>Reduzir mais 2kg até o próximo mês.</strong></p>
                </div>
            </div>

            <!-- Atualizações -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">Atualizações Recentes</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Adicionado novo item no plano: <strong>Salada de quinoa</strong>.</li>
                        <li class="list-group-item">Ajuste na porção de proteína: <strong>+50g de frango no almoço</strong>.</li>
                        <li class="list-group-item">Meta atingida: <strong>Redução de 1,5kg na última semana!</strong></li>
                    </ul>
                </div>
            </div>

            <!-- Lembretes -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">Lembretes</div>
                <div class="card-body">
                    <ul>
                        <li><strong>Beba água:</strong> Lembre-se de beber pelo menos 8 copos de água por dia.</li>
                        <li><strong>Atividade física:</strong> Não se esqueça de realizar pelo menos 30 minutos de exercícios diários.</li>
                        <li><strong>Refeições regulares:</strong> Siga os horários recomendados para suas refeições.</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</div>

<?= $this->endSection() ?>
