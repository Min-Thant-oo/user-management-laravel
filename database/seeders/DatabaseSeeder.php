<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Features
        $features = ['user', 'roles', 'product'];
        foreach ($features as $f) {
            Feature::create(['name' => $f]);
        }

        // Seed Permissions
        $perms = ['create', 'read', 'update', 'delete'];
        $perm_id = 1;
        foreach ([1, 2, 3] as $f_id) {
            foreach ($perms as $p) {
                Permission::create([
                    'id' => $perm_id++,
                    'name' => $p,
                    'feature_id' => $f_id
                ]);
            }
        }

        // Seed Roles
        $adminRole = Role::create(['id' => 1, 'name' => 'admin']);
        $operatorRole = Role::create(['id' => 2, 'name' => 'operator']);
        $cashierRole = Role::create(['id' => 3, 'name' => 'Cashier']);

        // Role Permissions
        $adminRole->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8]);
        $operatorRole->permissions()->attach([1, 2, 3, 5, 6, 7]);
        $cashierRole->permissions()->attach([1, 2, 3]);

        // Create Admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        // Create Regular User (Cashier)
        User::factory()->create([
            'name' => 'Test Cashier',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);
    }
}