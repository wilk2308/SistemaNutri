<?php
namespace App\Controllers;

use App\Models\NoticiaModel;
use App\Models\FeriasModel;
use App\Models\EventModel; // Certifique-se de que existe um modelo para eventos

class Home extends BaseController
{
    protected $noticiaModel;
    protected $feriasModel;
    protected $eventModel;

    public function __construct()
    {
        $this->noticiaModel = new NoticiaModel();
        $this->feriasModel = new FeriasModel();
        $this->eventModel = new EventModel(); // Inicialize o modelo de eventos
    }

    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('/login');
        }

        $userData = session()->get('user');
        $noticias = $this->noticiaModel->orderBy('data', 'DESC')->findAll();
        $ferias = $this->feriasModel->orderBy('start_date', 'DESC')->findAll();

        

        // Buscar compromissos do dia atual
        $today = date('Y-m-d');
        $compromissosHoje = $this->eventModel->where('start', $today)->findAll();

        return view('home', [
            'user' => $userData,
            'noticias' => $noticias,
            'ferias' => $ferias,
            'compromissosHoje' => $compromissosHoje // Passar compromissos para a view
        ]);
    }
}
