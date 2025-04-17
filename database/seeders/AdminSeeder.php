<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't already exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create permissions if they don't already exist
        $editPermission = Permission::firstOrCreate(['name' => 'edit articles']);
        $deletePermission = Permission::firstOrCreate(['name' => 'delete articles']);

        // Assign permissions to roles (use syncWithoutDetaching to avoid duplicates)
        $adminRole->syncPermissions([$editPermission, $deletePermission]);
        $userRole->syncPermissions([$editPermission]);

        // Create admin user if not exists
        $user = User::firstOrCreate(
            ['email' => 'admin@remodlingexpert.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('admin!@#'),
            ]
        );

        // Assign admin role to user (only if not already assigned)
        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}
