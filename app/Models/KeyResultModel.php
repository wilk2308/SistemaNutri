<?php
namespace App\Models;

use CodeIgniter\Model;

class KeyResultModel extends Model
{
    protected $table = 'key_results';
    protected $primaryKey = 'id';
    protected $allowedFields = ['meta_id', 'descricao', 'concluido'];
}
