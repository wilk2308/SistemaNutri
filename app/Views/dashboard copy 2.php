<?= $this->section('content') ?>

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

        .modal-header,
        .modal-footer {
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

        .info-icon {
            cursor: pointer;
            color: #007BFF;
            margin-left: 10px;
        }

        .info-icon:hover {
            color: #0056b3;
        }

        .info-icon i {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>


    <div class="container">
        <img src="assets/img/logo.jpg" alt="Logo" class="logo">
        <h1 class="text-center mb-4">Dashboard de Metas - OKR</h1>

        <?php
$user = session()->get('user');

if ($user !== null && isset($user['username'])): ?>
    <div class="text-center">
        <span class="d-block text-gray-600 small">
            Bem-vindo, <?= esc($user['username']); ?>
        </span>
        <!-- Link de Logout -->
        <a href="<?= site_url('logout'); ?>" class="text-primary mt-1 d-block">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
    </div>
<?php else: ?>
    <div class="text-center">
        <span class="d-block text-gray-600 small">Olá, Visitante</span>
    </div>
<?php endif; ?>




        <div class="row mt-4">
            <div class="col-md-6">
                <label for="anoSelect" class="form-label">Selecione o Ano:</label>
                <select id="anoSelect" class="form-select" onchange="filtrarPorAnoETrimestre()">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
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

        <ul class="nav nav-tabs" id="metaTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="diretoria-tab" data-bs-toggle="tab" data-bs-target="#diretoria" type="button" role="tab">Diretoria</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="vendas-tab" data-bs-toggle="tab" data-bs-target="#vendas" type="button" role="tab">Vendas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing" type="button" role="tab">Marketing</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="TI-tab" data-bs-toggle="tab" data-bs-target="#TI" type="button" role="tab">TI</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="juridico-tab" data-bs-toggle="tab" data-bs-target="#juridico" type="button" role="tab">Jurídico</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="RH-tab" data-bs-toggle="tab" data-bs-target="#RH" type="button" role="tab">RH</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Financeiro-tab" data-bs-toggle="tab" data-bs-target="#Financeiro" type="button" role="tab">Financeiro</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Atendimento-tab" data-bs-toggle="tab" data-bs-target="#Atendimento" type="button" role="tab">Atendimento</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab">Média de Conclusão</button>
            </li>
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

        <div class="modal fade" id="editKeyResultsModal" tabindex="-1" aria-labelledby="editKeyResultsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKeyResultsModalLabel">Editar Key Results</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editKeyResultsForm">
                            <div id="keyResultsList">
                                <!-- Os Key Results serão gerados dinamicamente aqui -->
                            </div>
                            <button type="button" class="btn btn-secondary mt-3" onclick="addNewKeyResult()">Adicionar Key Result</button>
                            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        async function renderMediaConclusaoChart() {
    try {
        // Busca os dados da rota correta
        const response = await fetch('/dashboard/media');
        if (!response.ok) {
            throw new Error('Erro ao buscar dados da média de conclusão');
        }

        const data = await response.json();

        // Processa os dados para o gráfico
        const labels = data.map(item => item.objetivo);
        const medias = data.map(item => item.media);

        // Seleciona o canvas do gráfico
        const ctx = document.getElementById('mediaObjetivoChart').getContext('2d');

        // Renderiza o gráfico
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Média de Conclusão (%)',
                    data: medias,
                    backgroundColor: 'rgba(204, 177, 120, 0.7)',
                    borderColor: 'rgba(204, 177, 120, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    } catch (error) {
        console.error('Erro:', error.message);
        alert('Erro ao carregar o gráfico de média de conclusão.');
    }
}

document.getElementById('media-tab').addEventListener('shown.bs.tab', function () {
    renderMediaConclusaoChart();
});


        async function fetchMetas(setor) {
            try {
                const response = await fetch(`/dashboard/metas/${setor}`);
                if (!response.ok) {
                    console.error(`Erro ao buscar metas para o setor ${setor}: ${response.statusText}`);
                    throw new Error('Erro ao buscar metas');
                }
                return await response.json();
            } catch (error) {
                console.error(error.message);
                return [];
            }
        }

        async function renderMetas(setor, containerId) {
            const metas = await fetchMetas(setor);
            const container = document.getElementById(containerId);
            if (!container) {
                console.error(`Container com ID ${containerId} não encontrado.`);
                return;
            }
            container.innerHTML = ''; // Limpa o conteúdo anterior

            if (metas.length === 0) {
                container.innerHTML = `<p class="text-center">Nenhuma meta encontrada para o setor ${setor}.</p>`;
                return;
            }

            metas.forEach(meta => {
                const progresso = meta.meta > 0 ? (meta.atual / meta.meta) * 100 : 0;

                const keyResultsHTML = (meta.key_results || []).map(kr => `
                    <li>
                        <input type="checkbox" ${kr.concluido ? 'checked' : ''} disabled>
                        ${kr.descricao}
                    </li>`).join('');

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
                                <div class="progress-bar" style="width: ${progresso}%">${progresso.toFixed(1)}%</div>
                            </div>
                            <h6 class="mt-3">Key Results:</h6>
                            <ul>
                                ${keyResultsHTML}
                            </ul>
                            <button class="btn btn-primary mt-3" onclick="openEditModal(${meta.id}, '${meta.titulo}', ${meta.meta}, ${meta.atual})">Editar Meta</button>
                            <button class="btn btn-secondary mt-3" onclick="openKeyResultsModal(${meta.id}, ${JSON.stringify(meta.key_results)})">Editar Key Results</button>
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
            const editModal = new bootstrap.Modal(document.getElementById('editMetaModal'));
            editModal.show();
        }

        function openKeyResultsModal(metaId, keyResults) {
            const keyResultsList = document.getElementById('keyResultsList');
            keyResultsList.innerHTML = '';

            keyResults.forEach((kr, index) => {
                keyResultsList.innerHTML += `
                    <div class="mb-3 key-result-item">
                        <label class="form-label">Key Result ${index + 1}</label>
                        <input type="text" class="form-control" value="${kr.descricao}" data-id="${kr.id}" />
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" ${kr.concluido ? 'checked' : ''} data-id="${kr.id}">
                            <label class="form-check-label">Concluído</label>
                        </div>
                    </div>
                `;
            });

            const editKeyResultsModal = new bootstrap.Modal(document.getElementById('editKeyResultsModal'));
            editKeyResultsModal.show();
        }

        function addNewKeyResult() {
            const keyResultsList = document.getElementById('keyResultsList');
            const index = keyResultsList.children.length + 1;

            keyResultsList.innerHTML += `
                <div class="mb-3 key-result-item">
                    <label class="form-label">Key Result ${index}</label>
                    <input type="text" class="form-control" placeholder="Descrição do Key Result" data-id="">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" data-id="">
                        <label class="form-check-label">Concluído</label>
                    </div>
                </div>
            `;
        }

        document.getElementById('editKeyResultsForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const keyResultsList = document.querySelectorAll('.key-result-item');
            const keyResults = Array.from(keyResultsList).map(item => ({
                id: item.querySelector('input[type="text"]').getAttribute('data-id'),
                descricao: item.querySelector('input[type="text"]').value,
                concluido: item.querySelector('input[type="checkbox"]').checked ? 1 : 0,
            }));

const metaId = document.getElementById('editKeyResultsForm').getAttribute('data-meta-id');

try {
    const response = await fetch(`/dashboard/metas/${metaId}/key-results`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ key_results: keyResults }),
    });

    if (!response.ok) {
        throw new Error('Erro ao salvar os Key Results');
    }

    alert('Key Results atualizados com sucesso!');
    const editKeyResultsModal = bootstrap.Modal.getInstance(document.getElementById('editKeyResultsModal'));
    editKeyResultsModal.hide();
    renderAllTabs();
} catch (error) {
    console.error(error);
    alert('Erro ao atualizar os Key Results');
}
});

function renderAllTabs() {
const setores = [
    { id: 'diretoria', name: 'Diretoria' },
    { id: 'vendas', name: 'Vendas' },
    { id: 'marketing', name: 'Marketing' },
    { id: 'TI', name: 'TI' },
    { id: 'juridico', name: 'Jurídico' },
    { id: 'RH', name: 'RH' },
    { id: 'Financeiro', name: 'Financeiro' },
    { id: 'Atendimento', name: 'Atendimento' }
];

setores.forEach(setor => {
    renderMetas(setor.id, `${setor.id}-dashboard`);
});
}

async function filtrarPorAnoETrimestre() {
const ano = document.getElementById('anoSelect').value;
const trimestre = document.getElementById('trimestreSelect').value;

const mesesMap = {
    1: 'Janeiro - Março',
    2: 'Abril - Junho',
    3: 'Julho - Setembro',
    4: 'Outubro - Dezembro'
};

document.getElementById('mesesSelecionados').innerText = `Meses: ${mesesMap[trimestre]} | Ano: ${ano}`;

// Implementação adicional, caso necessário, para filtrar os dados baseados no ano e trimestre.
}

// Inicializa a renderização de todas as abas
document.addEventListener('DOMContentLoaded', renderAllTabs);
</script>
</body>

</html>

