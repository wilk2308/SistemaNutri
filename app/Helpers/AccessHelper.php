<?php

use CodeIgniter\Database\BaseBuilder;

function checkAccess($userId, $resource, $action)
{
    $db = \Config\Database::connect();
    $builder = $db->table('permissions')
                  ->select("permissions.*")
                  ->join('user_groups', 'permissions.group_id = user_groups.group_id')
                  ->where('user_groups.user_id', $userId)
                  ->where('permissions.resource', $resource);

    $permission = $builder->get()->getRow();

    if (!$permission) {
        return false;
    }

    return $permission->$action; // ex: can_view, can_edit
}
