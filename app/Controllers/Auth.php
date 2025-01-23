<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $credentials = $this->request->getPost(['email', 'password']);

            // Tenta realizar o login
            $userModel = new UserModel();
            $user = $userModel->where('email', $credentials['email'])->first();

            if ($user && password_verify($credentials['password'], $user->password_hash)) {
                // Login bem-sucedido, salva os dados do usuário na sessão
                session()->set('user', [
                    'id'       => $user->id,
                    'username' => $user->username,
                    'email'    => $user->email,
                ]);

                return redirect()->to('/home'); // Redireciona após o login bem-sucedido
            } else {
                return redirect()->back()->with('error', 'Credenciais inválidas.');
            }
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy(); // Destrói a sessão
        return redirect()->to('/auth/login');
    }
}
