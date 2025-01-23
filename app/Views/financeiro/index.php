<?= $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="my-4">Financeiro</h1>
    
    <!-- Seção de Regras de Pagamento -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>Regras de Pagamento de Remunerações Variáveis</h5>
        </div>
        <div class="card-body">
            <p>Consulte as regras atualizadas sobre remunerações variáveis e outros benefícios. Clique no link abaixo para mais detalhes:</p>
            <a href="/docs/regras-financeiro.pdf" class="btn btn-primary" target="_blank">Ver Regras</a>
        </div>
    </div>

    <!-- Seção de Avisos do Financeiro -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5>Avisos do Financeiro</h5>
        </div>
        <div class="card-body">
            <?php if (!empty($avisos)): ?>
                <ul class="list-group">
                    <?php foreach ($avisos as $aviso): ?>
                        <li class="list-group-item">
                            <strong><?= esc($aviso['titulo']) ?></strong>
                            <p><?= esc($aviso['descricao']) ?></p>
                            <small class="text-muted">Publicado em: <?= date('d/m/Y', strtotime($aviso['data_criacao'])) ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Sem avisos financeiros no momento.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
