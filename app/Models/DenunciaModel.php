<?php
namespace App\Models;

use CodeIgniter\Model;

class DenunciaModel extends Model
{
    protected $table = 'denuncias'; // Nome da sua tabela
    protected $primaryKey = 'id';
    protected $allowedFields = ['classificacao', 'descricao', 'data_submissao', 'gravidade'];
}
