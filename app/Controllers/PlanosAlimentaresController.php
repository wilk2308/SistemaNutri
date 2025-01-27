<?php

namespace App\Controllers;

class PlanosAlimentaresController extends BaseController
{
    public function index()
    {
        return view('pagina_planos_alimentares'); // Certifique-se de que o nome da view é 'pagina_planos_alimentares.php'
    }
}
