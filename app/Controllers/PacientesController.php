<?php

namespace App\Controllers;

class PacientesController extends BaseController
{
    public function index()
    {
        return view('pagina_pacientes'); // Certifique-se de que o nome do arquivo é 'pagina_pacientes.php'
    }
}
