<?php
namespace App\Models;

use CodeIgniter\Model;

class AvisoModel extends Model
{
    protected $table = 'avisos'; // Nome da tabela no banco
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'descricao', 'data_criacao'];
}
