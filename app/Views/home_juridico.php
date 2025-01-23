
<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>




<!-- DASHBOARD -->
<div class="container-fluid">

<!-- Titulo Painel -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bem-vindo à Intranet da Bocayuva Advogados!</h1>

    <!-- Botão Gerar Relatórios -->
    <a href="<?= site_url('relatorio/download') ?>" class="btn btn-primary btn-sm shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Gerar relatório</a>
</div>

<!-- Acesso Rápido -->
<div class="row mb-4">
    <div class="btn-group">
        <a href="http://glpi.bocayuvaadvogados.com.br/front/ticket.php" class="btn btn-secondary">GLPI</a>
        <a href="https://app.astrea.net.br/#/login/BR" class="btn btn-secondary">Astrea</a>
        <a href="https://www.office.com/?auth=2" class="btn btn-secondary">Office 365</a>
        <a href="https://accounts.rdstation.com.br/?redirect_to=https%3A%2F%2Fapp.rdstation.com.br%2Fauth%2Fcallback"
           class="btn btn-secondary">RD Station</a>
        <a href="https://moodle.bocayuvaadvogados.com.br/?redirect=0" class="btn btn-secondary">Moodle</a>
        <a href="http://3.16.56.77/teampass/index.php" class="btn btn-secondary">Teampass</a>
    </div>
</div>

<!-- SCRIPT NOTIFICAÇÕES -->
<script>
    var conn = new WebSocket('ws://localhost:8080');

    conn.onopen = function(e) {
        console.log("Conectado ao WebSocket!");
    };

    conn.onmessage = function(e) {
        // Exibir notificação recebida
        var notification = JSON.parse(e.data);
        alert(notification.message); // Pode ser um alert ou uma notificação mais sofisticada
    };
</script>


<!-- Gráficos -->
<div class="row">
<div class="col-lg-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Distribuição de Processos</h6>
        </div>
        <div class="card-body">
            <div class="canvas-container">
                <canvas id="processosChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx1 = document.getElementById('processosChart').getContext('2d');
    var processosChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Em Andamento', 'Concluídos', 'Em Apelação', 'Arquivados'],
            datasets: [{
                label: 'Processos',
                data: [25, 12, 8, 5], // Dados iniciais
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Função AJAX para atualizar o gráfico a cada 60 segundos
    $(document).ready(function() {
        function updateCharts() {
            $.ajax({
                url: 'relatorios/getData.php',
                method: 'GET',
                success: function(data) {
                    processosChart.data.datasets[0].data = [data.emAndamento, data.concluidos, data.emApelacao, data.arquivados];
                    processosChart.update();
                }
            });
        }

        // Atualiza o gráfico a cada 60 segundos
        setInterval(updateCharts, 60000);
    });
</script>


    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Casos Resolvidos</h6>
            </div>
            <div class="card-body">
                <div class="canvas-container">
                    <canvas id="resolvidosChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<div class="row">



                        <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Compromissos de Hoje</h6>
        </div>
        <div class="card-body">
            <ul>
                <li>10:00 - Reunião com Cliente XYZ</li>
                <li>13:00 - Audiência no Fórum Central</li>
                <li>15:00 - Prazo de Apelação - Processo 123456</li>
            </ul>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Últimos Documentos</h6>
        </div>
        <div class="card-body">
            <ul>
                <li><a href="<?= site_url('documentos/view/1') ?>">Contrato de Prestação de Serviços - Cliente ABC</a></li>
                <li><a href="<?= site_url('documentos/view/2') ?>">Procuração - Processo 987654</a></li>
                <li><a href="<?= site_url('documentos/view/3') ?>">Petição Inicial - Ação de Cobrança</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Processos Ativos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Casos Resolvidos no Mês</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Avisos e Notícias</h6>
        </div>
        <div class="card-body">
            <p><strong>15/08/2024:</strong> Novo prazo para entrega de documentos fiscais.</p>
            <p><strong>12/08/2024:</strong> Mudanças na legislação trabalhista impactando contratos.</p>
            <p><strong>10/08/2024:</strong> Workshop sobre práticas jurídicas eficazes.</p>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row mb-4">
        <!-- Seção de Solicitações de Férias -->
        <div class="col-xl-6 col-lg-5"> <!-- Ajuste a coluna para caber lado a lado -->
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

        <!-- Seção de Aniversariantes do Dia -->
        <div class="col-xl-6 col-lg-5"> <!-- Mudei a largura para 6 para que ambas as seções ocupem espaço igual -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aniversariantes do Dia</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Sem Aniversariantes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





<style>

    /* Layout otimizado para dispositivos menores (como celulares) */
@media (max-width: 768px) {
    .container-fluid {
        padding: 10px;
    }

    .btn-group .btn {
        flex: 1 1 100%; /* Botões ocupam 100% da largura no mobile */
    }

    .row {
        flex-direction: column; /* Coloca os cards um embaixo do outro */
    }

    .col-lg-6,
    .col-xl-4 {
        width: 100%; /* Ocupa toda a largura em telas pequenas */
    }
}

/* Layout otimizado para dispositivos maiores (como TVs ou telas largas) */
@media (min-width: 1200px) {
    .container-fluid {
        padding: 20px;
    }

    /* Aumentar o espaço entre os botões */
    .btn-group {
        gap: 20px;
    }

    /* Aumentar o tamanho dos cards */
    .col-lg-6,
    .col-xl-4 {
        flex: 1;
        max-width: 45%; /* Ocupa 45% da largura em telas maiores */
    }

    /* Tamanho dos gráficos maior em telas largas */
    .canvas-container {
        height: 500px;
    }
}


    /* Estilos gerais */
.container-fluid {
    padding: 15px;
}

/* Flexbox para organizar os botões de acesso rápido */
.btn-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Espaço entre os botões */
}

.btn-group .btn {
    flex: 1;
    min-width: 150px; /* Garante que os botões tenham um tamanho mínimo em telas menores */
}

/* Gráficos e Cards em Flexbox */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Espaço entre os cards */
}

.col-lg-6,
.col-xl-4 {
    flex: 1;
    min-width: 300px; /* Defina um tamanho mínimo para os cards */
}

/* Gráficos */
.canvas-container {
    height: 400px; /* Altura fixa para os gráficos */
    width: 100%;
}



    /* Aniversariantes */
/* Estilo geral da janela modal */
.aniversariantes-modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7); /* Fundo mais escuro */
    animation: fadeIn 0.5s ease-in-out; /* Animação de entrada */
}

/* Estilo do conteúdo da janela */
.aniversariantes-content {
    background-color: #ffffff;
    margin: 10% auto;
    padding: 30px;
    border-radius: 15px;
    width: 40%;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Sombra suave */
    animation: slideDown 0.6s ease-out; /* Animação de deslizamento */
    font-family: 'Arial', sans-serif;
    color: #333333; /* Texto mais suave */
}

/* Estilo do botão de fechar */
.close-btn {
    color: #ff4d4d;
    float: right;
    font-size: 28px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.close-btn:hover,
.close-btn:focus {
    color: #cc0000; /* Mudança de cor ao passar o mouse */
    cursor: pointer;
}

/* Estilo do título */
.aniversariantes-content h2 {
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #4e73df; /* Cor principal */
    font-family: 'Verdana', sans-serif;
}

/* Estilo da lista de aniversariantes */
.aniversariantes-content ul {
    list-style-type: none;
    text-align: center;
    padding: 0;
    font-size: 1.2rem;
}

.aniversariantes-content ul li {
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
    position: relative;
    transition: background-color 0.3s ease;
}

.aniversariantes-content ul li:hover {
    background-color: #f8f9fc; /* Cor de fundo suave ao passar o mouse */
}

.aniversariantes-content ul li:before {
    content: "🎂"; /* Emoji de bolo de aniversário */
    text-align: center;
    
    left: -25px;
    font-size: 1.2rem;
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes slideDown {
    from {transform: translateY(-50px);}
    to {transform: translateY(0);}
}
</style>


<!-- ATIVAR QUANDO TIVER ANIVERSARIANTE
<div id="aniversariantesModal" class="aniversariantes-modal">
    <div class="aniversariantes-content">
        <span class="close-btn">&times;</span>
        <h2>🎉 Aniversariantes do Dia 🎉</h2>
        <ul>
            <li> William Sousa - 23/08</li>
            
        </ul>
    </div>
</div>

-->
<style>
.equipe .card-img-top {
    height: 300px;
    object-fit: cover;
    width: 100%;
}

.equipe .card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.equipe .card-body {
    text-align: center;
}

.equipe .card-title {
    font-weight: bold;
}

.equipe .card-text {
    color: #6c757d;
}
</style>


<div class="container-fluid equipe">
    <h1 class="h3 mb-4 text-gray-800">Nossa Equipe</h1>
    <div class="row">

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/marcela.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Marcela Bocayuva</h6>
                    <p class="card-text">Sócia Fundadora</p>
                </div>
            </div>
        </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/felipe.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Felipe Bocayuva</h6>
                    <p class="card-text">Sócio Fundador</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/paula.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Paula Hartmann</h6>
                    <p class="card-text">Gerente</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/Melba.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Melba Bocayuva</h6>
                    <p class="card-text">Gestão de Pessoas</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/kelli.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Kelli Cristina</h6>
                    <p class="card-text">Gestão de Pessoas</p>
                </div>
            </div>
        </div>

    
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/mucio.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Emílio Múcio</h6>
                    <p class="card-text">Advogado</p>
                </div>
            </div>
        </div>
        <!-- TROCAR PELA Rithyeli Monteiro
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/gabriel.jpg" class="card-img-top" alt="Gabriel Cruz">
                <div class="card-body">
                    <h6 class="card-title">Gabriel Cruz</h6>
                    <p class="card-text">Advogado</p>
                </div>
            </div>
        </div>
        -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/lucas.jpg" class="card-img-top" alt="Gabriel Cruz">
                <div class="card-body">
                    <h6 class="card-title">Lucas Sampaio</h6>
                    <p class="card-text">Advogado</p>
                </div>
            </div>
        </div>

        <!-- 
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/matheus.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Matheus Barcelos</h6>
                    <p class="card-text">Advogado</p>
                </div>
            </div>
        </div>
        -->

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/rafael.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Rafael Baroni</h6>
                    <p class="card-text">Advogado</p>
                </div>
            </div>
        </div>

        

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/Petrine.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Petrine Pintor</h6>
                    <p class="card-text">Secretaria</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/Rafaela.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Rafaela Paiva</h6>
                    <p class="card-text">Secretaria</p>
                </div>
            </div>
        </div>

     
        <!--
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/Rebecca.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Rebecca Cavalcanti </h6>
                    <p class="card-text">Marketing</p>
                </div>
            </div>
        </div>
        -->
       

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/gabrielc.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Gabriel Cardoso</h6>
                    <p class="card-text">Vendas</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/Thamires.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Thamires Belo</h6>
                    <p class="card-text">Financeiro</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/ercília.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">Ercília Correa</h6>
                    <p class="card-text">Serviços Gerais</p>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/Will.jpg" class="card-img-top" alt="Emílio Múcio">
                <div class="card-body">
                    <h6 class="card-title">William Sousa</h6>
                    <p class="card-text">Tecnologia</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <img src="/assets/img/mateus.jpg" class="card-img-top" alt="Mateus">
                <div class="card-body">
                    <h6 class="card-title">Mateus Soares</h6>
                    <p class="card-text">Marketing</p>
                </div>
            </div>
        </div>

        
        <!-- Adicionar mais colunas conforme necessário -->
    </div>
</div>









<?= $this->section('scripts') ?>

<script>

    
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("aniversariantesModal");
    var closeBtn = document.querySelector(".close-btn");

    // Exibe a janela automaticamente após 1 segundo
    setTimeout(function() {
        modal.style.display = "block";
    }, 1000);

    // Fecha a janela quando o usuário clicar no "X"
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Fecha a janela se o usuário clicar fora do conteúdo
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
</script>

<script>
    var ctx1 = document.getElementById('processosChart').getContext('2d');
    var processosChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Em Andamento', 'Concluídos', 'Em Apelação', 'Arquivados'],
            datasets: [{
                label: 'Processos',
                data: [25, 12, 8, 5],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctx2 = document.getElementById('resolvidosChart').getContext('2d');
    var resolvidosChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril'],
            datasets: [{
                label: 'Casos Resolvidos',
                data: [5, 7, 10, 12],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    
</script>
<?= $this->endSection() ?>


                        
<?= $this->endSection() ?>
