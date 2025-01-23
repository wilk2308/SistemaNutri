<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DenunciaModel;

class DenunciasController extends Controller
{
    protected $denunciaModel;

    public function __construct()
    {
        $this->denunciaModel = new DenunciaModel();
    }

    public function index()
    {
        // Recupera todas as denúncias do banco de dados
        $denuncias = $this->denunciaModel->findAll();
        $data['denuncias'] = $denuncias;

        // Retorna a view com os dados das denúncias
        return view('rh/denuncias', $data);
    }
    public function form()
{
    return view('denuncias/form'); // Certifique-se de que a view exista
}

public function agradecimento()
{
    return view('denuncias/agradecimento');
}



    public function submit()
    {
        $validation = \Config\Services::validation();
        
        // Regras de validação
        $validation->setRules([
            'classificacao' => 'required',
            'descricao' => 'required',
            'data_submissao' => 'required|valid_date',
            'gravidade' => 'required'
        ]);
        
        if (!$this->validate($validation->getRules())) {
            // Se a validação falhar, retorna para o formulário com os erros
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Recupera os dados do formulário
        $classificacao = $this->request->getPost('classificacao');
        $descricao = $this->request->getPost('descricao');
        $dataSubmissao = $this->request->getPost('data_submissao');
        $gravidade = $this->request->getPost('gravidade');

        // Salva os dados no banco de dados
        $this->denunciaModel->insert([
            'classificacao' => $classificacao,
            'descricao' => $descricao,
            'data_submissao' => $dataSubmissao,
            'gravidade' => $gravidade
        ]);

        // Redireciona com uma mensagem de sucesso
        return redirect()->to('/denuncias/agradecimento')->with('message', 'Denúncia enviada com sucesso!');
    }
}

