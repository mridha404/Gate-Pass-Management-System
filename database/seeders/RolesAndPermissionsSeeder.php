<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            'view-users',
            'create-users',
            'update-users',
            'delete-users',
            // Add more permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign all permissions to super-admin
        $superAdminRole->permissions()->attach(Permission::all());

        // Assign specific permissions to admin
        $adminRole->permissions()->attach(Permission::whereIn('name', ['view-users', 'create-users', 'update-users'])->get());

        // Assign super-admin role to a user
        $superAdmin = User::where('email', 'soc2@vu.edu.bd')->first();
        if ($superAdmin) {
            $superAdmin->roles()->attach($superAdminRole);
        }
    }
}
