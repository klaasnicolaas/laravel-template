<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Reset cached roles and permissions
         */
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        app()['cache']->forget('spatie.permission.cache');

        $permissions = [
            'role-create',
            'role-delete',
            'role-read',
            'role-update',
            'user-create',
            'user-delete',
            'user-read',
            'user-update',
        ];

        /**
         * Create all permission based on the list above
         */
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /**
         * Supervisor is defined in AuthServiceProvider
         */
        Role::create(['name' => 'Admin'])
            ->givePermissionTo(Permission::all());

        /**
         * Admin role
         */
        Role::create(['name' => 'Manager'])
            ->givePermissionTo([
                'user-read',
                'role-read',
            ]);

        // User
        Role::create(['name' => 'User']);
    }
}
