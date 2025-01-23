<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Database\Exceptions\DataException;

class UserModel extends Model
{
    protected $table = 'users'; // Certifique-se de que a tabela 'users' existe e está correta.
    protected $primaryKey = 'id';
    protected $returnType = User::class;

    protected $allowedFields = ['username', 'email', 'password_hash', 'employee_id'];

    protected $validationRules = [
        'email' => 'required|valid_email',
        'username' => 'required|min_length[3]',
        // Remova ou ajuste a regra de senha conforme necessário para sua aplicação.
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'O campo Email é obrigatório.',
            'valid_email' => 'Você deve fornecer um endereço de email válido.',
        ],
        'username' => [
            'required' => 'O campo Nome de Usuário é obrigatório.',
            'min_length' => 'O Nome de Usuário precisa ter pelo menos 3 caracteres.',
        ],
    ];

    public function saveUser(array $data)
    {
        if (!$this->validate($data)) {
            throw new DataException($this->errors());
        }

        $user = new User($data);
        if (!$this->save($user)) {
            throw new DataException('Erro ao salvar o usuário.');
        }

        return $user;
    }
}
