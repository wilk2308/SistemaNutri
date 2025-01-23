<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'assets';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'patrimonio', 'descricao', 'local', 'condicao', 'responsavel', 'valor', 'checked'
    ];
}
