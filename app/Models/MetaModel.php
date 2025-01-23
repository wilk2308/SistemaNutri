<?php

namespace App\Models;

use CodeIgniter\Model;

class MetaModel extends Model
{
    protected $table = 'metas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'meta', 'atual', 'setor', 'observacoes', 'objetivo', 'usuario_id', 'created_at', 'updated_at'];
}
