<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UsuarioModel;
  
class CadastroController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('cadastro', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'nome'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'senha'      => 'required|min_length[4]|max_length[50]',
            'confirmasenha'  => 'matches[senha]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UsuarioModel();
            $data = [
                'nome'     => $this->request->getVar('nome'),
                'email'    => $this->request->getVar('email'),
                'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('cadastro', $data);
        }
          
    }
  
}