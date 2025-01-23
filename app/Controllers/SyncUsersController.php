<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FuncionarioModel;
use CodeIgniter\Shield\Entities\User;

class SyncUsersController extends BaseController
{
    public function index()
    {
        $funcionarioModel = new FuncionarioModel();
        $userModel = new UserModel();

        // Buscar todos os funcionários do sistema de férias
        $funcionarios = $funcionarioModel->findAll();

        foreach ($funcionarios as $funcionario) {
            // Verificar se o usuário já existe no sistema de autenticação pelo employee_id
            $existingUser = $userModel->where('employee_id', $funcionario['id'])->first();

            if (!$existingUser) {
                // Gerar um email fictício baseado no nome do funcionário
                $email = strtolower(str_replace(' ', '.', $funcionario['nome'])) . '@bocayuvaadvogados.com.br';
                $password = 'senha_padrao123';

                // Exibir email gerado para depuração
                var_dump("Gerando email: $email"); // Para verificar o email gerado

                // Criar um novo usuário para o funcionário
                $newUser = new User([
                    'username'    => $funcionario['nome'],
                    'email'       => $email,
                    'password'    => $password,
                    'employee_id' => $funcionario['id'],
                ]);

                // Salvar o novo usuário no sistema de autenticação
                if (!$userModel->save($newUser)) {
                    log_message('error', "Erro ao salvar usuário {$funcionario['nome']}: " . implode(', ', $userModel->errors()));
                    echo "Erro ao salvar usuário {$funcionario['nome']}: " . implode(', ', $userModel->errors()) . "<br>";
                } else {
                    echo "Usuário {$funcionario['nome']} criado com email: {$email}<br>";
                }
            } else {
                echo "Usuário já existe para o funcionário: {$funcionario['nome']}<br>";
            }
        }

        return "Sincronização concluída. Funcionários adicionados como usuários.";
    }

    public function updateEmployeeIds()
    {
        $userModel = new UserModel();
        $funcionarioModel = new FuncionarioModel();

        // Buscar todos os usuários que têm employee_id em branco ou nulo
        $usuariosSemEmployeeId = $userModel->where('employee_id', null)->findAll();

        foreach ($usuariosSemEmployeeId as $usuario) {
            // Tenta encontrar o funcionário correspondente pelo nome
            $funcionario = $funcionarioModel->where('nome', $usuario->username)->first();

            // Se o funcionário foi encontrado, atualiza o employee_id no usuário
            if ($funcionario) {
                $usuario->employee_id = $funcionario['id'];

                // Salvar a atualização no banco de dados
                $userModel->skipValidation(true); // Desativar temporariamente a validação
                $userModel->save($usuario);
                
                echo "employee_id atualizado para o usuário: " . $usuario->username . "<br>";
            } else {
                echo "Funcionário não encontrado para o usuário: " . $usuario->username . "<br>";
            }
        }

        echo "Sincronização de employee_id concluída.";
    }
}
