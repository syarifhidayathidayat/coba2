<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $roles = [
            'Admin',
            'Direktur',
            'PPK',
            'Pejabat-Pengadaan53',
            'Pejabat-Pengadaan52',
            'Staff',
            'Keuangan',
            'Penyedia',
        ];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create admin user
        $Admin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);
        $Admin->assignRole('Admin');

        // Create default menus
        $menus = [
            [
                'name' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'route' => 'dashboard',
                'order' => 1,
                'roles' => ['Admin', 'Direktur', 'PPK', 'Pejabat-Pengadaan53', 'Pejabat-Pengadaan52', 'Staff', 'Keuangan', 'Penyedia']
            ],
            [
                'name' => 'Manajemen Menu',
                'icon' => 'fas fa-bars',
                'route' => 'menu.index',
                'order' => 2,
                'roles' => ['Admin']
            ],
            [
                'name' => 'Manajemen User',
                'icon' => 'fas fa-users',
                'route' => 'user.index',
                'order' => 3,
                'roles' => ['Admin']
            ],
            [
                'name' => 'Surat Perintah',
                'icon' => 'fas fa-file-alt',
                'route' => 'sp.index',
                'order' => 4,
                'roles' => ['Admin', 'Direktur', 'PPK', 'Pejabat-Pengadaan53', 'Pejabat-Pengadaan52', 'Keuangan', 'Penyedia']
            ],
            [
                'name' => 'BAST',
                'icon' => 'fas fa-file-signature',
                'route' => 'bast.index',
                'order' => 5,
                'roles' => ['Admin', 'Direktur', 'PPK', 'Pejabat-Pengadaan53', 'Pejabat-Pengadaan52', 'Keuangan', 'Penyedia']
            ],
        ];

        foreach ($menus as $menuData) {
            $menu = \App\Models\Menu::firstOrCreate([
                'name' => $menuData['name'],
                'route' => $menuData['route'],
            ], [
                'icon' => $menuData['icon'],
                'order' => $menuData['order'],
                'is_active' => true
            ]);

            $roles = Role::whereIn('name', $menuData['roles'])->get();
            $menu->roles()->sync($roles);
        }
    }
}
