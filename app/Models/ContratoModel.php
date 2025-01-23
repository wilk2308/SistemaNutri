<?php
namespace App\Models;

use CodeIgniter\Model;

class ContratoModel extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['numero_contrato', 'nome_cliente', 'data_fechamento', 'area', 'materia'];

    // Ativa timestamps automáticos
    protected $useTimestamps = true;

    // Regras de validação
    protected $validationRules = [
        'numero_contrato' => 'required|is_unique[contratos.numero_contrato]',
        'nome_cliente' => 'required|max_length[255]',
        'data_fechamento' => 'valid_date',
        'area' => 'required',
        'materia' => 'required',
    ];

    // Mensagens de validação personalizadas
    protected $validationMessages = [
        'numero_contrato' => [
            'required' => 'O número do contrato é obrigatório.',
            'is_unique' => 'Este número de contrato já existe.',
        ],
        'nome_cliente' => [
            'required' => 'O nome do cliente é obrigatório.',
            'max_length' => 'O nome do cliente não pode ter mais que 255 caracteres.',
        ],
        'data_fechamento' => [
            'valid_date' => 'A data de fechamento deve estar no formato válido.',
        ],
        'area' => [
            'required' => 'A área é obrigatória.',
        ],
        'materia' => [
            'required' => 'A matéria é obrigatória.',
        ],
    ];

    // Método para gerar um número de contrato único
    public function gerarNumeroContrato()
    {
        $anoAtual = date('Y');

        // Gera um número randômico de 3 dígitos
        $numeroRandomico = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT) . '/' . $anoAtual;

        // Garante que o número é único
        while ($this->where('numero_contrato', $numeroRandomico)->countAllResults() > 0) {
            $numeroRandomico = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT) . '/' . $anoAtual;
        }

        return $numeroRandomico;
    }
}
