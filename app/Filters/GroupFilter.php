<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Authentication\Authentication;
use CodeIgniter\Shield\Entities\User;

class GroupFilter
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('authentication');
        $user = $auth->user();

        // Verifica se o usuário está autenticado
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Faça login para continuar.');
        }

        // Verifica se o usuário pertence ao grupo
        if (!empty($arguments) && !$user->inGroup($arguments[0])) {
            return redirect()->to('/')->with('error', 'Acesso negado. Você não tem permissão.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Pós-processamento, se necessário
    }
}
