<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    // Exibe a página de login
    public function index()
    {
        return view('login');
    }

    // Processa a tentativa de login
    public function store()
    {
        // Captura os dados do formulário de login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        log_message('info', 'Email recebido: ' . $email);
        log_message('info', 'Senha recebida: ' . $password);

        // Verifica se os campos estão preenchidos
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Os campos Email e Senha são obrigatórios.');
        }

        // Credenciais para autenticação
        $credentials = [
            'email'    => $email,
            'password' => $password
        ];

        // Tentativa de login
        if (auth()->attempt($credentials)) {
            // Se o login for bem-sucedido, armazena os dados do usuário na sessão
            $user = auth()->user();

            // Salvar dados do usuário na sessão
            session()->set('user', [
                'id'       => $user->id,
                'username' => $user->username,
                'email'    => $user->email,
                // Adicione outros dados que você precisar
            ]);

            // Redireciona para a página inicial após o login
            return redirect()->to('/home'); // Altere isso para a rota correta, se necessário
        } else {
            return redirect()->back()->with('error', 'Credenciais inválidas. Tente novamente.');
        }
    }

    // Realiza o logout do usuário
    public function destroy()
    {
        auth()->logout();
        session()->destroy(); // Opcional: limpar a sessão ao fazer logout
        return redirect()->to('/login');
    }
}

