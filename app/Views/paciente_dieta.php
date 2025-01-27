<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Informações da Dieta -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Informações da Dieta
        </div>
        <div class="card-body">
            <p><strong>Nome da Dieta:</strong> Low Carb</p>
            <p><strong>Data de Início:</strong> 10/01/2025</p>
            <p><strong>Duração:</strong> 30 dias</p>
            <p><strong>Objetivo:</strong> Perder 5kg</p>
            <p><strong>Progresso:</strong> 60%</p>
        </div>
    </div>

    <!-- Refeições do Dia -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Refeições do Dia
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Café da Manhã:</strong> Omelete com queijo e café sem açúcar</li>
                <li class="list-group-item"><strong>Lanche da Manhã:</strong> Iogurte natural com frutas vermelhas</li>
                <li class="list-group-item"><strong>Almoço:</strong> Peito de frango grelhado, salada de folhas e arroz integral</li>
                <li class="list-group-item"><strong>Lanche da Tarde:</strong> Mix de castanhas</li>
                <li class="list-group-item"><strong>Jantar:</strong> Sopa de legumes com carne magra</li>
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
        </div>
    </div>

    <!-- Atualizações do Nutricionista -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-white">
            Atualizações do Nutricionista
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Adicionar 50g de proteína no almoço.</li>
                <li class="list-group-item">Reduzir consumo de carboidratos após as 18h.</li>
                <li class="list-group-item">Aumentar ingestão de água para 2,5L por dia.</li>
            </ul>
        </div>
    </div>

    <!-- Lembretes de Saúde -->
    <div class="card mb-4">
        <div class="card-header bg-danger text-white">
            Lembretes Importantes
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Beba água:</strong> 2,5L por dia.</li>
                <li><strong>Atividade física:</strong> Realize pelo menos 30 minutos de exercícios diários.</li>
                <li><strong>Refeições regulares:</strong> Não pule refeições.</li>
            </ul>
        </div>
    </div>

    <!-- Botão para Consultar Nutricionista -->
    <div class="text-center mt-4">
        <a href="/paciente/mensagens" class="btn btn-primary btn-lg">
            Consultar Nutricionista
        </a>
    </div>
</div>

<?= $this->endSection() ?>
