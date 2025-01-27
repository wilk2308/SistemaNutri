<?php

namespace App\Controllers;

class PacienteController extends BaseController
{
    public function index()
    {
        // Página inicial do paciente
        return view('tela_inicial_paciente'); // Certifique-se de que o arquivo está salvo como 'tela_inicial_paciente.php'
    }

    public function dieta()
    {
        // Renderizar a view da dieta do paciente
        return view('paciente_dieta'); // Certifique-se de que o arquivo está salvo como 'paciente_dieta.php'
    }
}
