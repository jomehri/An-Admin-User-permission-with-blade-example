<?php

namespace Database\Seeders\Basic;

use Database\Seeders\BaseSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends BaseSeeder
{

    /**
     * @return void
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'admin',
        ]);

        $permission = Permission::create([
            'name' => 'approve requests',
        ]);

        $permission->assignRole($role);
    }
}
