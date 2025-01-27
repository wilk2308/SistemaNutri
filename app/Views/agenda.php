<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Título da Página -->
    <div class="text-center my-4">
        <h1 class="display-6">Agenda</h1>
        <p class="text-muted">Gerencie seus compromissos de forma simples e eficiente.</p>
    </div>

    <!-- Calendário -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <button id="prev-month" class="btn btn-light btn-sm">&#8249; Mês Anterior</button>
            <h2 id="month-year" class="m-0">Janeiro 2025</h2>
            <button id="next-month" class="btn btn-light btn-sm">Próximo Mês &#8250;</button>
        </div>
        <div class="card-body">
            <table id="calendar" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Dom</th>
                        <th>Seg</th>
                        <th>Ter</th>
                        <th>Qua</th>
                        <th>Qui</th>
                        <th>Sex</th>
                        <th>Sáb</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de semana -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Lista de Eventos -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Eventos do Dia
        </div>
        <div class="card-body">
            <ul id="event-list" class="list-group">
                <li class="list-group-item">Nenhum evento cadastrado.</li>
            </ul>
        </div>
    </div>

    <!-- Adicionar Evento -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            Adicionar Novo Evento
        </div>
        <div class="card-body">
            <form id="event-form">
                <div class="mb-3">
                    <label for="event-date" class="form-label">Data:</label>
                    <input type="date" id="event-date" name="event-date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="event-title" class="form-label">Título:</label>
                    <input type="text" id="event-title" name="event-title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="event-description" class="form-label">Descrição:</label>
                    <textarea id="event-description" name="event-description" rows="3" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Salvar Evento</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
