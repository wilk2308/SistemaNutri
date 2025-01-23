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

    <!-- Página de Aprovação de Solicitações de Férias -->
<div class="container-fluid">
    <!-- Título da Página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aprovação de Solicitações de Férias</h1>
    </div>

    <!-- Mensagens de Sucesso ou Erro -->
    <?php if (session()->has('message')): ?>
        <div class="alert alert-success">
            <?= session('message') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <!-- Tabela de Solicitações -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Solicitações de Férias</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Funcionário</th>
                                    <th>Data de Início</th>
                                    <th>Data de Término</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($requests as $request): ?>
                                    <tr>
                                        <td><?= esc($request['id']) ?></td>
                                        <td><?= esc($request['funcionario_nome']) ?></td>
                                        <td><?= esc($request['start_date']) ?></td>
                                        <td><?= esc($request['end_date']) ?></td>
                                        <td><?= esc($request['status']) ?></td>
                                        <td>
                                            <form action="<?= site_url('ferias/approve') ?>" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= esc($request['id']) ?>">
                                                <input type="hidden" name="status" value="aprovado">
                                                <button type="submit" class="btn btn-sm btn-success">Aprovar</button>
                                            </form>
                                            <form action="<?= site_url('ferias/reject') ?>" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= esc($request['id']) ?>">
                                                <input type="hidden" name="status" value="rejeitado">
                                                <button type="submit" class="btn btn-sm btn-danger">Rejeitar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                    <ul>
                        <li>11:00 - Reunião Semanal</li>
                        
                    </ul>
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
                        <li><a href="<?=('https://bocayuvaadv.sharepoint.com/:f:/r/sites/FinanceiroBocayuva/Documentos%20Compartilhados/ADM%20BOCAYUVA/RECURSOS%20HUMANOS?csf=1&web=1&e=TQpJKB') ?>">Documentos</a></li>
                        
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
                    <p><strong>01/11/2024:</strong> Reunião semanal 11 horas da manhã.</p>
                    
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- Status das Solicitações de Férias -->
        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status das Solicitações de Férias</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($requests)): ?>
                        <ul>
                            <?php foreach ($requests as $request): ?>
                                <li>
                                    <strong>Período:</strong> <?= $request['start_date'] ?> a <?= $request['end_date'] ?>
                                    - <strong>Status:</strong> <?= $request['status'] ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Não há solicitações de férias pendentes ou aprovadas.</p>
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
                //["nome" => "Rithyeli Monteiro", "cargo" => "Advogada", "imagem" => "rithyeli.jpg"],
                ["nome" => "Lucas Sampaio", "cargo" => "Advogado", "imagem" => "lucas.jpg"],
                ["nome" => "Rafael Baroni", "cargo" => "Advogado", "imagem" => "rafael.jpg"],
                ["nome" => "Petrine Pintor", "cargo" => "Secretaria", "imagem" => "Petrine.jpg"],
                ["nome" => "Rafaela Paiva", "cargo" => "Secretaria", "imagem" => "Rafaela.jpg"],
                ["nome" => "Gabriel Cardoso", "cargo" => "Vendas", "imagem" => "gabrielc.jpg"],
                ["nome" => "Thamires Belo", "cargo" => "Financeiro", "imagem" => "Thamires.jpg"],
                ["nome" => "Ercília Correa", "cargo" => "Serviços Gerais", "imagem" => "ercília.jpg"],
                ["nome" => "William Sousa", "cargo" => "Tecnologia", "imagem" => "Will.jpg"],
                ["nome" => "Mateus Soares", "cargo" => "Marketing", "imagem" => "mateus.jpg"]
            ];

            foreach ($team_members as $member): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card border-0">
                        <img src="/assets/img/<?= $member['imagem'] ?>" class="card-img-top" alt="<?= $member['nome'] ?>">
                        <div class="card-body">
                            <h6 class="card-title"><?= $member['nome'] ?></h6>
                            <p class="card-text"><?= $member['cargo'] ?></p>
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
