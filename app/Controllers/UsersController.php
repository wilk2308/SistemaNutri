<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Services\AccessService; // Importa o serviço AccessService
use CodeIgniter\Controller;


class UsersController extends Controller
{
    protected $userModel;
    protected $accessService;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->accessService = new AccessService(); // Instancia o serviço
    }

    public function index()
{
    // Busca todos os usuários no banco
    $usuarios = $this->userModel->findAll();

    // Passa os usuários para a view
    return view('users/index', ['usuarios' => $usuarios]);
}


public function create()
{
    $db = \Config\Database::connect();

    // Busca o maior employee_id atual no banco
    $query = $db->table('users')->selectMax('employee_id')->get();
    $result = $query->getRow();

    // Incrementa o valor do ID (se for nulo, começa com 1)
    $nextEmployeeId = $result->employee_id ? $result->employee_id + 1 : 1;

    // Passa o próximo ID para a view
    return view('users/create', ['nextEmployeeId' => $nextEmployeeId]);
}


public function store()
{
    $data = [
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'employee_id' => $this->request->getPost('employee_id'),
    ];

    // Validação
    if (!$this->validate([
        'username' => 'required|min_length[3]',
        'email' => 'required|valid_email',
        'password' => 'required|min_length[8]',
        'employee_id' => 'required|numeric',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Insere o usuário
    if ($this->userModel->insert($data)) {
        return redirect()->to('/usuarios')->with('message', 'Usuário criado com sucesso!');
    }

    return redirect()->back()->with('error', 'Erro ao criar o usuário.');
}


public function edit($id)
{
    $user = $this->userModel->find($id);

    if (!$user) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Usuário com ID {$id} não encontrado");
    }

    return view('users/edit', ['usuario' => $user]);
}

public function update($id)
{
    $data = [
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'employee_id' => $this->request->getPost('employee_id'),
    ];

    // Atualiza a senha se informada
    if ($this->request->getPost('password')) {
        $data['password_hash'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    if ($this->userModel->update($id, $data)) {
        return redirect()->to('/usuarios')->with('message', 'Usuário atualizado com sucesso!');
    }

    return redirect()->back()->with('error', 'Erro ao atualizar o usuário.');
}

public function delete($id)
{
    if ($this->userModel->delete($id)) {
        return redirect()->to('/users')->with('message', 'Usuário excluído com sucesso!');
    }

    return redirect()->back()->with('errors', 'Erro ao excluir o usuário.');
}



    public function addToGroup($id)
    {
        $group = $this->request->getPost('group'); // Recebe o nome do grupo

        if ($this->accessService->addUserToGroup($id, $group)) {
            return redirect()->back()->with('message', "Usuário adicionado ao grupo '{$group}' com sucesso!");
        }

        return redirect()->back()->with('errors', "Erro ao adicionar o usuário ao grupo '{$group}'.");
    }

    public function removeFromGroup($id)
    {
        $group = $this->request->getPost('group'); // Recebe o nome do grupo

        if ($this->accessService->removeUserFromGroup($id, $group)) {
            return redirect()->back()->with('message', "Usuário removido do grupo '{$group}' com sucesso!");
        }

        return redirect()->back()->with('errors', "Erro ao remover o usuário do grupo '{$group}'.");
    }


    public function listGroups()
    {
        // Carrega o serviço do banco de dados
        $db = \Config\Database::connect();
    
        // Busca todos os grupos diretamente da tabela 'auth_groups'
        $groups = $db->table('auth_groups')
                     ->select('id, name, description')
                     ->get()
                     ->getResultArray();
    
        // Passa os grupos para a view
        return view('groups/index', ['grupos' => $groups]);
    }
    
    
    

public function listUserGroups($id)
{
    // Verifica se o usuário existe
    $user = $this->userModel->find($id);
    if (!$user) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Usuário com ID $id não encontrado");
    }

    // Busca os grupos do usuário
    $groups = $this->accessService->getUserGroups($id);

    // Passa os dados para a view
    return view('users/user_groups', ['user' => $user, 'groups' => $groups]);
}
public function createGroup()
{
    if ($this->request->getMethod() === 'post') {
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        if ($this->accessService->createGroup($data)) {
            return redirect()->to('/grupos')->with('message', 'Grupo criado com sucesso!');
        }

        return redirect()->back()->with('errors', 'Erro ao criar o grupo.');
    }

    return view('groups/create');
}
public function storeGroup()
{
    $db = \Config\Database::connect();

    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
    ];

    // Insere o grupo no banco
    if ($db->table('auth_groups')->insert($data)) {
        return redirect()->to('/grupos')->with('message', 'Grupo criado com sucesso!');
    }

    return redirect()->back()->with('error', 'Erro ao criar o grupo.');
}

public function deleteGroup($id)
{
    $db = \Config\Database::connect();

    // Deleta o grupo com base no ID
    if ($db->table('auth_groups')->delete(['id' => $id])) {
        return redirect()->to('/grupos')->with('message', 'Grupo excluído com sucesso!');
    }

    return redirect()->back()->with('error', 'Erro ao excluir o grupo.');
}

public function editGroup($id)
{
    $db = \Config\Database::connect();

    // Busca o grupo pelo ID
    $group = $db->table('auth_groups')->where('id', $id)->get()->getRowArray();

    if (!$group) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Grupo não encontrado");
    }

    // Passa o grupo para a view
    return view('groups/edit', ['grupo' => $group]);
}



public function updateGroup($id)
{
    $db = \Config\Database::connect();

    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
    ];

    // Atualiza o grupo
    if ($db->table('auth_groups')->update($data, ['id' => $id])) {
        return redirect()->to('/grupos')->with('message', 'Grupo atualizado com sucesso!');
    }

    return redirect()->back()->with('error', 'Erro ao atualizar o grupo.');
}





}


