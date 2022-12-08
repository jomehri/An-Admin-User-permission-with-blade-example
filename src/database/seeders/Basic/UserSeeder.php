<?php

namespace Database\Seeders\Basic;

use App\Models\User;
use Database\Seeders\BaseSeeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends BaseSeeder
{

    /**
     * @return void
     */
    public function run(): void
    {
        /**
         * Permissions/Roles seeds
         */
        $this->seedAdminPermissions();
        $this->seedUserPermissions();

        /**
         * A few sample user seeds
         */
        $this->seedUser();
        $this->seedAdmin();
    }

    /**
     * @return void
     */
    public function seedUser(): void
    {
        $user = User::create(
            [
                'name' => 'Alibaba User',
                'email' => 'user@alibaba.ir',
                'email_verified_at' => now(),
                'password' => bcrypt("123456"),
            ]
        );

        $user->assignRole('finance');
    }

    /**
     * @return void
     */
    public function seedAdmin(): void
    {
        $user = User::create([
            'name' => 'Alibaba Admin',
            'email' => 'admin@alibaba.ir',
            'email_verified_at' => now(),
            'password' => bcrypt("123456"),
        ]);

        $user->assignRole('admin');
    }

    /**
     * @return void
     */
    public function seedAdminPermissions(): void
    {
        $role = Role::create(['name' => 'admin']);

        /**
         * Approve requests permission
         */
        $permission = Permission::create(['name' => 'approve requests']);
        $permission->assignRole($role);

        /**
         * Reject requests permission
         */
        $permission = Permission::create(['name' => 'reject requests']);
        $permission->assignRole($role);
    }

    /**
     * @return void
     */
    public function seedUserPermissions(): void
    {
        $role = Role::create(['name' => 'finance']);

        /**
         * Send payment requests finance permission
         */
        $permission = Permission::create(['name' => 'send requests']);
        $permission->assignRole($role);
    }
}
