<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

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
                </ul>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Acompanhamento Nutricional</h1>
            </div>

            <!-- Dados Pessoais -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Dados Pessoais</div>
                <div class="card-body">
                    <p><strong>Nome:</strong> Thaynara Milena</p>
                    <p><strong>Idade:</strong> 27 anos</p>
                    <p><strong>Peso Atual:</strong> 82,0 kg</p>
                    <p><strong>Altura:</strong> 1,53 m</p>
                    <p><strong>IMC Atual:</strong> 35 kg/m² - Obesidade Grau II</p>
                </div>
            </div>

            <!-- Exames Bioquímicos -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">Exames Bioquímicos Recentes</div>
                <div class="card-body">
                    <ul>
                        <li><strong>Ferritina:</strong> 24,7 (baixo ferro sérico e ferritina)</li>
                        <li><strong>Vitamina D:</strong> 25 (decrescente)</li>
                        <li><strong>B12:</strong> 245 (decrescente)</li>
                        <li><strong>Cortisol:</strong> 2,55 (baixa energia e disposição)</li>
                    </ul>
                </div>
            </div>

            <!-- Medicamentos e Efeitos Adversos -->
            <div class="card mb-4">
                <div class="card-header bg-warning text-dark">Medicamentos</div>
                <div class="card-body">
                    <p><strong>Respiridona:</strong> Não há registros de interferência na absorção de nutrientes.</p>
                    <p><strong>Duloxetina:</strong> Não há registros de interferência na absorção de nutrientes.</p>
                    <p><strong>Anticoncepcional:</strong> Pode contribuir com deficiências de vitaminas e minerais a longo prazo.</p>
                </div>
            </div>

            <!-- Queixas Clínicas -->
            <div class="card mb-4">
                <div class="card-header bg-danger text-white">Principais Queixas Clínicas</div>
                <div class="card-body">
                    <ul>
                        <li>Ansiedade</li>
                        <li>Azia e estufamento</li>
                        <li>Fadiga, cansaço extremo</li>
                        <li>Queda de cabelo</li>
                        <li>Retenção de líquido</li>
                        <li>Compulsão por doces</li>
                    </ul>
                </div>
            </div>

            <!-- Estratégias e Lista de Compras -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">Estratégias de Melhora</div>
                <div class="card-body">
                    <p><strong>Objetivos:</strong> Reduzir IMC, melhorar estilo de vida e sintomas clínicos.</p>
                    <p><strong>Desafios:</strong> Manter boa hidratação, realizar exercícios e dormir adequadamente.</p>
                </div>
            </div>
        </main>
    </div>
</div>

<?= $this->endSection(); ?>
