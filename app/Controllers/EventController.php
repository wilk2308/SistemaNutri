<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\Controller;

class EventController extends Controller
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        helper(['url', 'form']);
    }

    public function addEvent()
    {
        if ($this->request->getMethod() === 'post') {
            // Receber os dados do evento
            $data = $this->request->getJSON(true);

            // Validar os dados recebidos
            if (!empty($data['title']) && !empty($data['start'])) {
                // Salvar no banco de dados
                $id = $this->eventModel->insert($data);

                if ($id) {
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Evento adicionado com sucesso',
                        'id' => $id
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Erro ao adicionar evento'
                    ]);
                }
            }

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Dados inválidos'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Método inválido'
        ]);
    }
}
