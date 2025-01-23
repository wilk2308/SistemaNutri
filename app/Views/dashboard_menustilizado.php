<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Metas por Setor - OKR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        body {
            background-color: #071B33;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 200px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
            background-color: #FFFFFF;
            color: #071B33;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .progress-bar {
            transition: width 0.5s ease;
            background-color: #CCB178;
        }
        .btn-primary {
            background-color: #CCB178;
            border: none;
            color: #071B33;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #bca068;
        }
        .btn-secondary {
            background-color: #FFFFFF;
            border: none;
            color: #071B33;
            border-radius: 20px;
        }
        .btn-secondary:hover {
            background-color: #e0e0e0;
        }
        .modal-header, .modal-footer {
            background-color: #071B33;
            color: #FFFFFF;
        }
        .modal-body p {
            margin-bottom: 10px;
        }
        .modal-body {
            padding: 20px;
            background-color: #071B33;
            color: #FFFFFF;
        }


        <style>
    .info-icon {
        cursor: pointer;
        color: #007BFF; /* Cor azul */
        margin-left: 10px;
    }

    .info-icon:hover {
        color: #0056b3; /* Azul mais escuro ao passar o mouse */
    }

    .info-icon i {
        font-size: 1.2rem;
    }

    .nav-link.destaque {
    background-color: #CCB178; /* Cor de destaque */
    color: #071B33; /* Cor do texto */
    font-weight: bold;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    transition: transform 0.2s ease, background-color 0.3s ease;
}

.nav-link.destaque:hover {
    background-color: #bca068;
    transform: scale(1.1); /* Aumenta ligeiramente ao passar o mouse */
    color: #FFFFFF;
}

.nav-link.destaque.active {
    background-color: #bca068;
    color: #FFFFFF;
    border: 2px solid #FFFFFF;
}


.nav-link.destaque {
    background-color: #CCB178;
    color: #071B33;
    font-weight: bold;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    transition: transform 0.2s ease, background-color 0.3s ease;
}

.nav-link.destaque:hover {
    background-color: #bca068;
    transform: scale(1.1);
    color: #FFFFFF;
}

.nav-link.destaque.active {
    background-color: #bca068;
    color: #FFFFFF;
    border: 2px solid #FFFFFF;
}


</style>

    </style>
</head>

<body>
    <div class="container">
    <img src="assets/img/logo.jpg" alt="Logo" class="logo">
        <h1 class="text-center mb-4">Dashboard de Metas - OKR</h1>

        <div class="row mt-4">
    <div class="col-md-6">
        <label for="anoSelect" class="form-label">Selecione o Ano:</label>
        <select id="anoSelect" class="form-select" onchange="filtrarPorAnoETrimestre()">
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            
            <!-- Adicione mais anos conforme necessário -->
        </select>
    </div>
    <div class="col-md-6">
        <label for="trimestreSelect" class="form-label">Selecione o Trimestre:</label>
        <select id="trimestreSelect" class="form-select" onchange="filtrarPorAnoETrimestre()">
            <option value="1">1º Trimestre (Jan-Mar)</option>
            <option value="2">2º Trimestre (Abr-Jun)</option>
            <option value="3">3º Trimestre (Jul-Set)</option>
            <option value="4">4º Trimestre (Out-Dez)</option>
        </select>
    </div>
</div>
<div class="text-center mt-3">
    <h5 id="mesesSelecionados">Meses: Janeiro - Março | Ano: 2024</h5>
</div>

<br>
<center>
<ul class="nav nav-tabs d-flex flex-wrap justify-content-center gap-2" id="metaTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active destaque" id="diretoria-tab" data-bs-toggle="tab" data-bs-target="#diretoria" type="button" role="tab">
            <i class="bi bi-building"></i> Diretoria
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="vendas-tab" data-bs-toggle="tab" data-bs-target="#vendas" type="button" role="tab">
            <i class="bi bi-cart-fill"></i> Vendas
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing" type="button" role="tab">
            <i class="bi bi-megaphone-fill"></i> Marketing
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="TI-tab" data-bs-toggle="tab" data-bs-target="#TI" type="button" role="tab">
            <i class="bi bi-laptop"></i> TI
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="juridico-tab" data-bs-toggle="tab" data-bs-target="#juridico" type="button" role="tab">
            <i class="bi bi-file-earmark-text"></i> Jurídico
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="RH-tab" data-bs-toggle="tab" data-bs-target="#RH" type="button" role="tab">
            <i class="bi bi-people-fill"></i> RH
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="Financeiro-tab" data-bs-toggle="tab" data-bs-target="#Financeiro" type="button" role="tab">
            <i class="bi bi-cash-stack"></i> Financeiro
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="Atendimento-tab" data-bs-toggle="tab" data-bs-target="#Atendimento" type="button" role="tab">
            <i class="bi bi-headset"></i> Atendimento
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link destaque" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab">
            <i class="bi bi-bar-chart-fill"></i> Média de Conclusão
        </button>
    </li>
</ul>





         
        </ul>

        <div class="tab-content mt-3" id="metaTabsContent">
            <div class="tab-pane fade show active" id="diretoria" role="tabpanel">
                <h3>Diretoria</h3>
                <div id="diretoria-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="vendas" role="tabpanel">
                <h3>Vendas</h3>
                <div id="vendas-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="marketing" role="tabpanel">
                <h3>Marketing</h3>
                <div id="marketing-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="TI" role="tabpanel">
                <h3>TI</h3>
                <div id="TI-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="juridico" role="tabpanel">
                <h3>Jurídico</h3>
                <div id="juridico-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="RH" role="tabpanel">
                <h3>RH</h3>
                <div id="RH-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="Financeiro" role="tabpanel">
                <h3>Financeiro</h3>
                <div id="Financeiro-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="Atendimento" role="tabpanel">
                <h3>Atendimento</h3>
                <div id="Atendimento-dashboard" class="row"></div>
            </div>
            <div class="tab-pane fade" id="media" role="tabpanel">
    <h3 class="text-center mt-4">Média de Conclusão por Objetivo</h3>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <canvas id="mediaObjetivoChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>


        </div>

        <div class="modal fade" id="editMetaModal" tabindex="-1" aria-labelledby="editMetaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMetaModalLabel">Editar Meta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editId">
                            <div class="mb-3">
                                <label for="editTitulo" class="form-label">Título</label>
                                <input type="text" id="editTitulo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="editMeta" class="form-label">Meta</label>
                                <input type="number" id="editMeta" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAtual" class="form-label">Atual</label>
                                <input type="number" id="editAtual" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>



        
        async function fetchMetas(setor) {
            try {
                const response = await fetch(`/dashboard/metas/${setor}`);
                if (!response.ok) throw new Error('Erro ao buscar metas');
                return await response.json();
            } catch (error) {
                console.error(error);
                return [];
            }
        }

        async function renderMetas(setor, containerId) {
            const metas = await fetchMetas(setor);
            const container = document.getElementById(containerId);
            container.innerHTML = '';

            metas.forEach(meta => {
    const progresso = (meta.atual / meta.meta) * 100;
    const card = document.createElement('div');
    card.className = 'col-md-6 col-lg-4';
    card.innerHTML = `
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">${meta.titulo}</h4>
                <p><strong>Setor Responsável:</strong> ${meta.setor}</p>
                <p><strong>Objetivo:</strong> ${meta.objetivo}</p>
                <p><strong>Meta:</strong> ${meta.meta}</p>
                <p><strong>Atual:</strong> ${meta.atual}</p>
                <div class="progress">
                    <div class="progress-bar" style="width: ${progresso}%;">${progresso.toFixed(1)}%</div>
                </div>
                <button class="btn btn-primary mt-2" onclick="openEditModal(${meta.id}, '${meta.titulo}', '${meta.objetivo}', ${meta.meta}, ${meta.atual})">Editar</button>
                ${meta.informacao ? `
                    <span class="info-icon" title="${meta.informacao}">
                        <i class="bi bi-info-circle-fill"></i>
                    </span>
                ` : ''}
            </div>
        </div>
    `;
    container.appendChild(card);
});

        }

        function openEditModal(id, titulo, meta, atual) {
            document.getElementById('editId').value = id;
            document.getElementById('editTitulo').value = titulo;
            
            document.getElementById('editMeta').value = meta;
            document.getElementById('editAtual').value = atual;
            new bootstrap.Modal(document.getElementById('editMetaModal')).show();
        }

        document.getElementById('editForm').addEventListener('submit', async function (event) {
            event.preventDefault();
            const id = document.getElementById('editId').value;
            const titulo = document.getElementById('editTitulo').value;
            
            const meta = document.getElementById('editMeta').value;
            const atual = document.getElementById('editAtual').value;

            try {
                const response = await fetch(`/dashboard/metas/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ titulo, meta, atual }),
                });
                if (!response.ok) throw new Error('Erro ao salvar meta');
                alert('Meta atualizada com sucesso!');
                renderMetas('Diretoria', 'diretoria-dashboard');
                renderMetas('Vendas', 'vendas-dashboard');
                renderMetas('Marketing', 'marketing-dashboard');
                renderMetas('TI', 'TI-dashboard');
                renderMetas('juridico', 'juridico-dashboard');
                renderMetas('RH', 'RH-dashboard');
                renderMetas('Financeiro', 'Financeiro-dashboard');
                renderMetas('Atendimento', 'Atendimento-dashboard');
            } catch (error) {
                console.error(error);
                alert('Erro ao atualizar meta');
            }
        });

        renderMetas('Diretoria', 'diretoria-dashboard');
        renderMetas('Vendas', 'vendas-dashboard'); 
        renderMetas('Marketing', 'marketing-dashboard');
        renderMetas('TI', 'TI-dashboard');
        renderMetas('juridico', 'juridico-dashboard');
        renderMetas('RH', 'RH-dashboard');
        renderMetas('Financeiro', 'Financeiro-dashboard');
        renderMetas('Atendimento', 'Atendimento-dashboard');

        
 // Função para buscar os dados da média de conclusão
async function fetchMedia() {
    try {
        const response = await fetch('/dashboard/media');
        if (!response.ok) throw new Error('Erro ao buscar dados');
        return await response.json();
    } catch (error) {
        console.error(error);
        return [];
    }
}

// Função para renderizar o gráfico
async function renderMediaChart() {
    const data = await fetchMedia();

    // Prepara os dados do gráfico
    const labels = data.map(item => item.objetivo);
    const medias = data.map(item => item.media);

    // Configura o gráfico
    const ctx = document.getElementById('mediaObjetivoChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Média (%)',
                    data: medias,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
    indexAxis: 'y', // Gráfico horizontal
    responsive: true,
    scales: {
        y: {
            ticks: {
                font: {
            size: 12,
            family: 'Arial',
            weight: 'bold'
        },
        
                
                maxRotation: 0, // Evita que os textos girem
                minRotation: 0
            }
        },
        x: {
            beginAtZero: true,
            max: 100
        }
    },
    plugins: {
        legend: {
            display: true,
            position: 'top'
        },
        tooltip: {
            callbacks: {
                label: function(context) {
                    return `${context.raw.toFixed(2)}%`;
                }
            }
        }
    }
}

    });
}

// Renderiza o gráfico quando a aba for clicada
document.getElementById('media-tab').addEventListener('click', renderMediaChart);

// Função para buscar e renderizar metas por ano e trimestre
async function filtrarPorAnoETrimestre() {
    const ano = document.getElementById('anoSelect').value;
    const trimestre = document.getElementById('trimestreSelect').value;

    const mesesMap = {
        1: "Janeiro - Março",
        2: "Abril - Junho",
        3: "Julho - Setembro",
        4: "Outubro - Dezembro"
    };

    // Atualiza a exibição de meses e ano
    document.getElementById('mesesSelecionados').innerText = `Meses: ${mesesMap[trimestre]} | Ano: ${ano}`;

    try {
        // Busca os valores filtrados do backend
        const response = await fetch(`/dashboard/cards/ano/${ano}/trimestre/${trimestre}`);
        if (!response.ok) throw new Error('Erro ao buscar os valores do trimestre');

        const dados = await response.json();

        // Atualiza os cards no frontend
        atualizarValoresNosCards(dados);
    } catch (error) {
        console.error(error);
        alert('Erro ao aplicar o filtro de trimestre');
    }
}

function atualizarValoresNosCards(dados) {
    // Atualiza apenas os valores dentro dos cards sem recriá-los
    dados.forEach(item => {
        const card = document.querySelector(`[data-meta-id="${item.id}"]`);
        if (card) {
            const valorAtualElem = card.querySelector('.valor-atual');
            const progressoElem = card.querySelector('.progress-bar');

            const progresso = (item.valor_atual / item.meta) * 100;

            // Atualiza os valores do card
            valorAtualElem.textContent = `Atual: ${item.valor_atual}`;
            progressoElem.style.width = `${progresso}%`;
            progressoElem.textContent = `${progresso.toFixed(1)}%`;
        }
    });
}



document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});





        
    </script>
</body>

</html>
