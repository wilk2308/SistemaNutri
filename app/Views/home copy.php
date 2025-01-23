<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>



<!-- DASHBOARD -->
<div class="container-fluid">

    <!-- Titulo Painel -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bem-vindo à Intranet da Bocayuva Advogados!</h1>
        <a href="<?= site_url('relatorio/download') ?>" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar relatório</a>
    </div>

    <!-- Acesso Rápido -->
    <div class="row mb-4">
        <div class="btn-group">
            <a href="http://glpi.bocayuvaadvogados.com.br/front/ticket.php" class="btn btn-secondary">GLPI</a>
            <a href="https://app.astrea.net.br/#/login/BR" class="btn btn-secondary">Astrea</a>
            <a href="https://www.office.com/?auth=2" class="btn btn-secondary">Office 365</a>
            <a href="https://accounts.rdstation.com.br/?redirect_to=https%3A%2F%2Fapp.rdstation.com.br%2Fauth%2Fcallback" class="btn btn-secondary">RD Station</a>
            <a href="https://moodle.bocayuvaadvogados.com.br/?redirect=0" class="btn btn-secondary">Moodle</a>
            <a href="http://3.16.56.77/teampass/index.php" class="btn btn-secondary">Teampass</a>
        </div>
    </div>

        <!-- Modal de Aniversariantes -->
        <div id="aniversariantesModal" class="aniversariantes-modal" style="display: none;">
        <div class="aniversariantes-content">
            <span class="close-btn">&times;</span>
            <h2>🎉 Aniversariantes do Dia 🎉</h2>
            <ul id="modalAniversariantesLista">
                <!-- Lista de aniversariantes do dia será preenchida dinamicamente -->
            </ul>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">GLPI Dashboard</h6>
                </div>
                <div class="card-body" style="height: 800px;">
                    <iframe src="http://glpi.bocayuvaadvogados.com.br/front/central.php?embed&dashboard=assistance&entities_id=0&is_recursive=0&token=d7f5d1bf-2037-5ea9-bfa7-9995a7b78540"
                            frameborder="0" 
                            style="width:100%; height:100%; border:0; overflow:hidden;" 
                            scrolling="no"
                            allowtransparency></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

 <!-- Compromissos de Hoje -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Compromissos de Hoje</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($eventsToday)): ?>
                <ul>
                    <?php foreach ($eventsToday as $event): ?>
                        <li><?= esc($event['title']) ?> - <small><?= date('H:i', strtotime($event['start'])) ?></small></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Sem Compromissos</p>
            <?php endif; ?>
        </div>
    </div>
</div>


        <!-- Últimos Documentos -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Documentos</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li><a href="<?=('https://bocayuvaadv.sharepoint.com/:f:/r/sites/FinanceiroBocayuva/Documentos%20Compartilhados/ADM%20BOCAYUVA/RECURSOS%20HUMANOS/COLABORADORES%20ATIVOS/William%20Gomes%20de%20Sousa?csf=1&web=1&e=CeUr1I') ?>">Documentos</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>

   <!-- Avisos e Notícias -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Avisos e Notícias</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($noticias)): ?>
                <?php foreach ($noticias as $noticia): ?>
                    <p><strong><?= date('d/m/Y', strtotime($noticia['data'])) ?>:</strong> <?= esc($noticia['titulo']) ?></p>
                    <p><?= esc($noticia['conteudo']) ?></p>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p><strong><?= date('d/m/Y') ?>:</strong> Não há avisos e notícias</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>


    <div class="row">
    <!-- Requisições de Férias -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Requisições de Férias</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($ferias)): ?>
                <?php foreach ($ferias as $requisicao): ?>
                    <p><strong>Funcionário:</strong> <?= esc($requisicao['employee_id'] ?? 'Não informado') ?></p>
                    <p><strong>Período:</strong> <?= date('d/m/Y', strtotime($requisicao['start_date'])) ?> a <?= date('d/m/Y', strtotime($requisicao['end_date'])) ?></p>
                    <p><strong>Status:</strong> <?= esc($requisicao['status']) ?></p>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Não há requisições de férias.</p>
            <?php endif; ?>
        </div>
    </div>
</div>



        <!-- Aniversariantes do Dia -->
        <div class="col-xl-5 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aniversariantes do Dia</h6>
                </div>
                <div class="card-body">
                    <ul id="aniversariantesLista">
                        <li>Sem Aniversariantes</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>



    <!-- Nossa Equipe -->
    <div class="container-fluid equipe">
        <h1 class="h3 mb-4 text-gray-800">Nossa Equipe</h1>
        <div class="row">

            <!-- Membros da Equipe -->
            <?php 
            $team_members = [
                ["nome" => "Marcela Bocayuva", "cargo" => "Sócia Fundadora", "imagem" => "marcela.jpg"],
                ["nome" => "Felipe Bocayuva", "cargo" => "Sócio Fundador", "imagem" => "felipe.jpg"],
                ["nome" => "Paula Hartmann", "cargo" => "Gerente", "imagem" => "paula.jpg"],
                ["nome" => "Melba Bocayuva", "cargo" => "Gestão de Pessoas", "imagem" => "Melba.jpg"],
                ["nome" => "Kelli Cristina", "cargo" => "Gestão de Pessoas", "imagem" => "kelli.jpg"],
                ["nome" => "Emílio Múcio", "cargo" => "Advogado", "imagem" => "mucio.jpg"],
                ["nome" => "Rithyeli Monteiro", "cargo" => "Advogada", "imagem" => "rithyeli.jpg"],
                ["nome" => "Lucas Sampaio", "cargo" => "Advogado", "imagem" => "lucas.jpg"],
                ["nome" => "Rafael Baroni", "cargo" => "Advogado", "imagem" => "rafael.jpg"],
                ["nome" => "Petrine Pintor", "cargo" => "Secretaria", "imagem" => "Petrine.jpg"],
                ["nome" => "Rafaela Paiva", "cargo" => "Secretaria", "imagem" => "Rafaela.jpg"],
                ["nome" => "Gabriel Cardoso", "cargo" => "Vendas", "imagem" => "gabrielc.jpg"],
                ["nome" => "Thamires Belo", "cargo" => "Financeiro", "imagem" => "Thamires.jpg"],
                ["nome" => "Jessica Soares", "cargo" => "Financeiro", "imagem" => "Jessica.jpg"],
                ["nome" => "Ercília Correa", "cargo" => "Serviços Gerais", "imagem" => "ercília.jpg"],
                ["nome" => "William Sousa", "cargo" => "Tecnologia", "imagem" => "Will.jpg"],
                ["nome" => "Mateus Soares", "cargo" => "Marketing", "imagem" => "mateus.jpg"]
            ];

            foreach ($team_members as $member): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card border-0 equipe-card">
                <img src="/assets/img/<?= $member['imagem'] ?>" class="card-img-top" alt="<?= $member['nome'] ?>">
                        <div class="card-body">
                            <h6 class="card-title"><?= $member['nome'] ?></h6>
                            <p class="card-text"><?= $member['cargo'] ?></p>
                        </div>
                                <!-- Mini Currículo -->
        <div class="card-overlay">
            <h5><?= $member['nome'] ?></h5>
                        <p><?= $member['cargo'] ?></p>
            <p>Mini currículo de <?= $member['nome'] ?>: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor.</p>
        </div>
  

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<!-- SCRIPTS -->
<?= $this->section('scripts') ?>
<script>
// Lista de aniversariantes
const aniversariantes = [
    { nome: 'Emilio Mucio', data: '2025-07-19' },
    { nome: 'Felipe Bocayuva', data: '2025-08-16' },
    { nome: 'Gabriel Cardoso', data: '2025-02-26' },
    { nome: 'Gustavo Bocayuva', data: '2025-08-16' },
    { nome: 'Hane Rocha', data: '2025-09-21' },
    { nome: 'Jéssica Soares', data: '2025-02-23' },
    { nome: 'Kelli Cristina', data: '2025-08-08' },
    { nome: 'Lucas Sampaio', data: '2025-07-24' },
    { nome: 'Marcela Bocayuva', data: '2025-08-16' },
    { nome: 'Mateus Soares', data: '2025-12-13' },
    { nome: 'Melba Bocayuva', data: '2025-08-16' },
    { nome: 'Paula Hartmann', data: '2025-08-06' },
    { nome: 'Petrine Pintor', data: '2025-02-17' },
    { nome: 'Rafael Baroni', data: '2025-04-14' },
    { nome: 'Raissa Fernandes', data: '2025-02-17' },
    { nome: 'Rithyeli Monteiro', data: '2024-11-14' },
    { nome: 'Rodolfo Bayma', data: '2024-12-13' },
    { nome: 'Thamires Belo', data: '2025-02-16' },
    { nome: 'William Sousa', data: '2024-08-23' }
];

// Função para verificar e exibir os aniversariantes do dia
document.addEventListener('DOMContentLoaded', function() {
    const hoje = new Date().toISOString().slice(0, 10);
    const aniversariantesHoje = aniversariantes.filter(pessoa => pessoa.data === hoje);
    
    const listaAniversariantes = document.getElementById('aniversariantesLista');
    const modalListaAniversariantes = document.getElementById('modalAniversariantesLista');
    
    if (aniversariantesHoje.length > 0) {
        listaAniversariantes.innerHTML = '';
        aniversariantesHoje.forEach(pessoa => {
            listaAniversariantes.innerHTML += `<li>${pessoa.nome}</li>`;
            modalListaAniversariantes.innerHTML += `<li>${pessoa.nome}</li>`;
        });
        
        const modal = document.getElementById("aniversariantesModal");
        const closeBtn = document.querySelector(".close-btn");

        modal.style.display = "block";

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
});
</script>
<?= $this->endSection() ?>

<style>
/* Estilos para o layout e cards */
.container-fluid.equipe {
    padding: 15px;
}
.card-img-top {
    height: 300px;
    object-fit: cover;
}
.card-title {
    font-weight: bold;
    text-align: center;
}
.card-text {
    text-align: center;
    color: #6c757d;
}
</style>

<?= $this->endSection() ?>
