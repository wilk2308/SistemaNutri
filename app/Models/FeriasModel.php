<?php namespace App\Models;

use CodeIgniter\Model;

class FeriasModel extends Model
{
    protected $table = 'solicitacoes_ferias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['employee_id', 'start_date', 'end_date', 'status'];
}
