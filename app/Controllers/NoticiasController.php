<?php

namespace App\Controllers;

use App\Models\NoticiaModel;
use CodeIgniter\Controller;

class NoticiasController extends Controller
{
    protected $noticiaModel;

    public function __construct()
    {
        $this->noticiaModel = new NoticiaModel();
        helper(['url', 'form']); // Carrega os helpers necessários
    }

    public function index()
    {
        $noticias = $this->noticiaModel->orderBy('data', 'DESC')->findAll();
        return view('noticias/index', ['noticias' => $noticias]);
    }

    public function formulario()
    {
        return view('noticias/cadastrar');
    }

    public function salvar()
    {
        $dados = [
            'titulo' => $this->request->getPost('titulo'),
            'conteudo' => $this->request->getPost('conteudo'),
            'data' => $this->request->getPost('data'),
            'imagem' => null, // Vamos preencher isso abaixo
        ];
    
        // Processar imagem (se enviada)
       // Processar imagem (se enviada)
$imagem = $this->request->getFile('imagem');
if ($imagem && $imagem->isValid() && !$imagem->hasMoved()) {
    $novoNome = $imagem->getRandomName();
    $imagem->move(FCPATH . 'uploads', $novoNome); // FCPATH aponta para a pasta public/
    $dados['imagem'] = 'uploads/' . $novoNome; // Salva o caminho relativo
}

    
        log_message('info', 'Dados recebidos para salvar: ' . json_encode($dados));
    
        // Tentar salvar os dados
        try {
            if ($this->noticiaModel->insert($dados)) {
                log_message('info', 'Notícia salva com sucesso.');
                return redirect()->to('/noticias')->with('success', 'Notícia cadastrada com sucesso!');
            } else {
                log_message('error', 'Erro ao salvar notícia: ' . json_encode($this->noticiaModel->errors()));
                return redirect()->back()->withInput()->with('error', 'Falha ao cadastrar a notícia.');
            }
        } catch (\Exception $e) {
            log_message('critical', 'Erro crítico: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Erro inesperado ao salvar a notícia.');
        }
    }
    
    
    
}
