<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $staff = Role::firstOrCreate(['name' => 'staff']);

        // Create permissions
        Permission::firstOrCreate(['name' => 'create electronics']);
        Permission::firstOrCreate(['name' => 'read electronics']);
        Permission::firstOrCreate(['name' => 'update electronics']);
        Permission::firstOrCreate(['name' => 'delete electronics']);
        Permission::firstOrCreate(['name' => 'update stok']);

        // Manager: CRUD penuh
        $manager->givePermissionTo(['create electronics', 'read electronics', 'update electronics', 'delete electronics']);

        // Staff: Read + Update Stok saja
        $staff->givePermissionTo(['read electronics', 'update stok']);

        // Create Manager User
       $managerUser = User::firstOrCreate(
    ['email' => 'manager@example.com'],
    [
        'name' => 'Argya Manager',
        'password' => Hash::make('Argyamanager'),
        'email_verified_at' => now(),
    ]
);

$managerUser->assignRole('manager');
$managerUser = User::firstOrCreate(
    ['email' => 'manager@example.com'],
    [
        'name' => 'Argya Manager',
        'password' => Hash::make('Argyamanager'),
        'email_verified_at' => now(),
    ]
);

$managerUser->assignRole('manager');
    }
}
