<?php

namespace App\Services;

use CodeIgniter\Database\Database;

class AccessService
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    // Adiciona usuário a um grupo (verificando se o grupo existe)
    public function addUserToGroup(int $userId, string $groupName): bool
    {
        // Verificar se o grupo existe
        $groupExists = $this->db->table('auth_groups')
            ->where('name', $groupName)
            ->countAllResults();

        if (!$groupExists) {
            return false; // Grupo não existe
        }

        // Verificar se o usuário já está no grupo
        $exists = $this->db->table('auth_groups_users')
            ->where('user_id', $userId)
            ->where('group', $groupName)
            ->countAllResults();

        if ($exists) {
            return false; // Usuário já está no grupo
        }

        // Adicionar o usuário ao grupo
        return $this->db->table('auth_groups_users')->insert([
            'user_id'    => $userId,
            'group'      => $groupName,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    // Remove usuário de um grupo
    public function removeUserFromGroup(int $userId, string $groupName): bool
    {
        return $this->db->table('auth_groups_users')
            ->where('user_id', $userId)
            ->where('group', $groupName)
            ->delete();
    }

    // Verifica se o usuário pertence a um grupo
    public function isUserInGroup(int $userId, string $groupName): bool
    {
        return $this->db->table('auth_groups_users')
            ->where('user_id', $userId)
            ->where('group', $groupName)
            ->countAllResults() > 0;
    }

    // Lista todos os grupos de um usuário
    public function getUserGroups(int $userId): array
    {
        return $this->db->table('auth_groups_users')
            ->select('group')
            ->where('user_id', $userId)
            ->get()
            ->getResultArray();
    }

    // Lista todos os grupos disponíveis
    public function getAllGroups(): array
    {
        return $this->db->table('auth_groups')
            ->select('name, description')
            ->get()
            ->getResultArray();
    }
    public function createGroup($data): bool
{
    return $this->db->table('auth_groups')->insert($data);
}

public function deleteGroup($id): bool
{
    return $this->db->table('auth_groups')->delete(['id' => $id]);
}

}
