<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>

<!-- DASHBOARD -->
<div class="container-fluid">

    <!-- Título e Subtítulo -->
    <div class="text-center my-4">
        <h1 class="display-5 text-primary">Bem-vindo ao Sistema Nutricional!</h1>
        <p class="lead text-secondary">Gerencie sua agenda, pacientes e planos alimentares com facilidade.</p>
    </div>

    <!-- Cartões Principais -->
    <div class="row text-center mb-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-2x text-success mb-3"></i>
                    <h5 class="card-title">Agenda</h5>
                    <a href="#" class="btn btn-outline-success">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-user-friends fa-2x text-info mb-3"></i>
                    <h5 class="card-title">Pacientes</h5>
                    <a href="#" class="btn btn-outline-info">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-utensils fa-2x text-warning mb-3"></i>
                    <h5 class="card-title">Planos Alimentares</h5>
                    <a href="#" class="btn btn-outline-warning">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-2x text-primary mb-3"></i>
                    <h5 class="card-title">Relatórios</h5>
                    <a href="#" class="btn btn-outline-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Outras Informações -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Gráficos de Desempenho</div>
                <div class="card-body">
                    <!-- Gráfico aqui -->
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Relatórios Recentes</div>
                <div class="card-body">
                    <p>Acesse os relatórios mais recentes e detalhados.</p>
                    <a href="#" class="btn btn-success">Ver Relatórios</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">Avisos e Notícias</div>
                <div class="card-body">
                    <p><strong>22/01/2025:</strong> Não há avisos e notícias.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">Compromissos de Hoje</div>
                <div class="card-body">
                    <p>Sem compromissos agendados.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 pt-3 border-top">
        <p class="text-muted">&copy; 2025 Sistema Nutri Fernanda Amorim. <br>Vamos juntos construir o seu melhor estilo de vida!</p>
    </footer>
</div>



<?= $this->endSection() ?>
