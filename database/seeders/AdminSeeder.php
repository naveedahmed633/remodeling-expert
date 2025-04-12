<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $editPermission = Permission::create(['name' => 'edit articles']);
        $deletePermission = Permission::create(['name' => 'delete articles']);

        $adminRole->givePermissionTo($editPermission);
        $adminRole->givePermissionTo($deletePermission);
        $userRole->givePermissionTo($editPermission);

        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@pnp-gym.com',
            'password' => bcrypt('admin!@#'),
        ]);

        $user->assignRole('admin');
    }
}
