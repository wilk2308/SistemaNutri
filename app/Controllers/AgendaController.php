<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\BaseBuilder;

class AgendaController extends Controller
{
    protected $db;
    protected $eventsTable;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->eventsTable = $this->db->table('events');
    }

    // Página da agenda
    public function index()
    {
        return view('agenda');
    }

    // Retorna os eventos em formato JSON
    public function getEvents()
    {
        $events = $this->eventsTable->get()->getResultArray();
        return $this->response->setJSON($events);
    }

    // Salva um novo evento
    public function saveEvent()
    {
        $data = $this->request->getPost();

        $this->eventsTable->insert([
            'title' => $data['title'],
            'start' => $data['start'],
            'end'   => $data['end'],
            'color' => $data['color'] ?? '#73b32a'
        ]);

        return $this->response->setJSON(['status' => 'success']);
    }

    // Atualiza um evento
    public function updateEvent($id)
    {
        $data = $this->request->getPost();

        $this->eventsTable->where('id', $id)->update([
            'title' => $data['title'],
            'start' => $data['start'],
            'end'   => $data['end'],
            'color' => $data['color'] ?? '#73b32a'
        ]);

        return $this->response->setJSON(['status' => 'success']);
    }

    // Exclui um evento
    public function deleteEvent($id)
    {
        $this->eventsTable->where('id', $id)->delete();

        return $this->response->setJSON(['status' => 'success']);
    }
}
