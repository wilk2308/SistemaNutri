<?php

namespace App\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model
{
    protected $table = 'fornecedores'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id'; // Supondo que a tabela tenha uma chave primária chamada "id"
    protected $allowedFields = [
        'NOME_DO_FORNECEDOR',
        'Nº_CONTRATO',
        'OBJETO_DO_CONTRATO',
        'DATA_DA_ASSINATURA',
        'VIGÊNCIA',
        'CRITICOS',
    ]; // Campos permitidos para inserção/atualização
}
