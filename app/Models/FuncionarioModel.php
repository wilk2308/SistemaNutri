<?php namespace App\Models;

use CodeIgniter\Model;

class FuncionarioModel extends Model
{
    protected $table = 'funcionarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'data_contratacao'];
    protected $useTimestamps = false; // Defina como true se você usar campos de timestamps

    /**
     * Busca todos os funcionários ou um funcionário específico pelo ID.
     *
     * @param int|null $id ID do funcionário
     * @return array|object|null Lista de funcionários ou funcionário específico
     */
    public function getFuncionario($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    /**
     * Adiciona um novo funcionário à tabela.
     *
     * @param array $data Dados do funcionário
     * @return bool True em caso de sucesso, false caso contrário
     */
    public function addFuncionario(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Atualiza os dados de um funcionário existente.
     *
     * @param int $id ID do funcionário
     * @param array $data Dados atualizados
     * @return bool True em caso de sucesso, false caso contrário
     */
    public function updateFuncionario($id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Exclui um funcionário pelo ID.
     *
     * @param int $id ID do funcionário
     * @return bool True em caso de sucesso, false caso contrário
     */
    public function deleteFuncionario($id)
    {
        return $this->delete($id);
    }

    /**
     * Verifica se o funcionário é elegível para solicitar férias (um ano de contratação).
     *
     * @param int $id ID do funcionário
     * @return bool True se elegível, false caso contrário
     */
    public function isEligibleForVacation($id)
    {
        $funcionario = $this->find($id);
        if ($funcionario) {
            $hireDate = new \DateTime($funcionario['data_contratacao']);
            $currentDate = new \DateTime();
            $yearsWorked = $currentDate->diff($hireDate)->y;
            return $yearsWorked >= 1;
        }
        return false;
    }
}
