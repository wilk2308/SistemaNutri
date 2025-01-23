<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiaModel extends Model
{
    protected $table = 'noticias'; // Nome da tabela no banco
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'conteudo', 'data', 'imagem']; // Campos que podem ser preenchidos
    protected $useTimestamps = true; // Se você está usando `created_at` e `updated_at`
}

