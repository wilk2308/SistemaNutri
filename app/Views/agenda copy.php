<?= $this->extend('master') ?>

<?= $this->section('title') ?>
Agenda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Agenda</h1>
    <button id="addEventBtn" class="btn btn-success mb-3">Adicionar Evento</button>
    <button id="showBirthdays" class="btn btn-primary mb-3">Mostrar Apenas Aniversariantes</button>
    <button id="showAllEvents" class="btn btn-secondary mb-3" style="display: none;">Mostrar Todos os Eventos</button>
    <div id="calendar"></div>

    <!-- Modal para adicionar evento -->
    <div id="addEventModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Evento</h5>
                    <button type="button" class="close" aria-label="Fechar" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addEventForm">
                        <div class="form-group">
                            <label for="eventTitle">Título</label>
                            <input type="text" class="form-control" id="eventTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Data</label>
                            <input type="date" class="form-control" id="eventDate" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="eventType">Tipo</label>
                            <select class="form-control" id="eventType" name="type">
                                <option value="default">Evento Padrão</option>
                                <option value="birthday">Aniversário</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar/excluir evento -->
    <div id="editEventModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar/Excluir Evento</h5>
                    <button type="button" class="close" aria-label="Fechar" onclick="closeEditModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editEventForm">
                        <div class="form-group">
                            <label for="editEventTitle">Título</label>
                            <input type="text" class="form-control" id="editEventTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventDate">Data</label>
                            <input type="date" class="form-control" id="editEventDate" name="date" required>
                        </div>
                        <button type="button" class="btn btn-danger" id="deleteEventBtn">Excluir</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var showBirthdaysBtn = document.getElementById('showBirthdays');
    var showAllEventsBtn = document.getElementById('showAllEvents');
    var addEventBtn = document.getElementById('addEventBtn');
    var addEventModal = document.getElementById('addEventModal');
    var editEventModal = document.getElementById('editEventModal');
    var addEventForm = document.getElementById('addEventForm');
    var editEventForm = document.getElementById('editEventForm');
    var deleteEventBtn = document.getElementById('deleteEventBtn');

    // Eventos iniciais
    var events = [
        { id: '1', title: 'Reunião com Cliente XYZ', start: '2024-08-25' },
        { id: '2', title: 'Audiência no Fórum', start: '2024-08-26' },
        { id: '3', title: 'Aniversário de Emilio Mucio', start: '2025-07-19', color: 'blue', type: 'birthday' },
        { id: '4', title: 'Aniversário de Felipe Bocayuva', start: '2025-08-16', color: 'blue', type: 'birthday' },
        { id: '5', title: 'Aniversário de Gabriel Cardoso', start: '2025-02-26', color: 'blue', type: 'birthday' },
        { id: '6', title: 'Aniversário de Gustavo Bocayuva', start: '2025-08-16', color: 'blue', type: 'birthday' },
        { id: '7', title: 'Aniversário de Hane Rocha', start: '2025-09-21', color: 'blue', type: 'birthday' },
        { id: '8', title: 'Aniversário de Jéssica Soares', start: '2025-02-23', color: 'blue', type: 'birthday' },
        { id: '9', title: 'Aniversário de Kelli Cristina', start: '2025-08-08', color: 'blue', type: 'birthday' },
        { id: '10', title: 'Aniversário de Lucas Sampaio', start: '2025-07-24', color: 'blue', type: 'birthday' },
        { id: '11', title: 'Aniversário de Marcela Bocayuva', start: '2025-08-16', color: 'blue', type: 'birthday' },
        { id: '12', title: 'Aniversário de Mateus Soares', start: '2025-12-13', color: 'blue', type: 'birthday' },
        { id: '13', title: 'Aniversário de Melba Bocayuva', start: '2025-08-16', color: 'blue', type: 'birthday' },
        { id: '14', title: 'Aniversário de Paula Hartmann', start: '2025-08-06', color: 'blue', type: 'birthday' },
        { id: '15', title: 'Aniversário de Petrine Pintor', start: '2025-02-17', color: 'blue', type: 'birthday' },
        { id: '16', title: 'Aniversário de Rafael Baroni', start: '2025-04-14', color: 'blue', type: 'birthday' },
        { id: '17', title: 'Aniversário de Raissa Fernandes', start: '2025-02-17', color: 'blue', type: 'birthday' },
        { id: '18', title: 'Aniversário de Rithyeli Monteiro', start: '2024-11-14', color: 'blue', type: 'birthday' },
        { id: '19', title: 'Aniversário de Rodolfo Bayma', start: '2024-12-13', color: 'blue', type: 'birthday' },
        { id: '20', title: 'Aniversário de Thamires Belo', start: '2025-02-16', color: 'blue', type: 'birthday' },
        { id: '21', title: 'Aniversário de William Sousa', start: '2025-08-23', color: 'blue', type: 'birthday' }
        // Outros eventos...
    ];

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: events,
        locale: 'pt-br',
        editable: true,
        eventClick: function(info) {
            openEditModal(info.event);
        }
    });

    calendar.render();

    // Abrir o modal para adicionar evento
    addEventBtn.addEventListener('click', function() {
        addEventModal.style.display = 'block';
    });

    // Fechar os modais
    function closeModal() {
        addEventModal.style.display = 'none';
    }

    function closeEditModal() {
        editEventModal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == addEventModal) {
            closeModal();
        }
        if (event.target == editEventModal) {
            closeEditModal();
        }
    }

    // Adicionar um novo evento ao calendário
    addEventForm.addEventListener('submit', function(event) {
        event.preventDefault();
        var title = document.getElementById('eventTitle').value;
        var date = document.getElementById('eventDate').value;
        var type = document.getElementById('eventType').value;

        if (title && date) {
            var newEvent = {
                id: String(events.length + 1),
                title: title,
                start: date,
                color: type === 'birthday' ? 'blue' : '',
                type: type
            };
            events.push(newEvent);
            calendar.addEvent(newEvent);
            closeModal();
            addEventForm.reset();
        }
    });

    // Função para abrir o modal de edição/exclusão de evento
    function openEditModal(event) {
        editEventModal.style.display = 'block';
        document.getElementById('editEventTitle').value = event.title;
        document.getElementById('editEventDate').value = event.startStr;

        // Atualizar o evento
        editEventForm.onsubmit = function(e) {
            e.preventDefault();
            var newTitle = document.getElementById('editEventTitle').value;
            var newDate = document.getElementById('editEventDate').value;

            event.setProp('title', newTitle);
            event.setStart(newDate);
            closeEditModal();
        };

        // Excluir o evento
        deleteEventBtn.onclick = function() {
            event.remove();
            closeEditModal();
        };
    }

    // Função para mostrar apenas aniversariantes
    showBirthdaysBtn.addEventListener('click', function() {
        var birthdayEvents = events.filter(event => event.type === 'birthday');
        calendar.removeAllEvents();
        calendar.addEventSource(birthdayEvents);
        showBirthdaysBtn.style.display = 'none';
        showAllEventsBtn.style.display = 'inline-block';
    });

    // Função para mostrar todos os eventos
    showAllEventsBtn.addEventListener('click', function() {
        calendar.removeAllEvents();
        calendar.addEventSource(events);
        showAllEventsBtn.style.display = 'none';
        showBirthdaysBtn.style.display = 'inline-block';
    });
});
</script>

<style>
.modal {
    display: none; 
    position: fixed; 
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; 
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover, .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<?= $this->endSection() ?>
