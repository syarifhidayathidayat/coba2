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
        $adminRole = Role::create(['name' => 'admin']);
        $direkturRole = Role::create(['name' => 'direktur']);
        $staffRole = Role::create(['name' => 'staff']);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // Assign admin role to admin user
        $admin->assignRole($adminRole);

        // Create default menus
        $menus = [
            [
                'name' => 'Dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'route' => 'dashboard',
                'order' => 1,
                'roles' => ['admin', 'direktur', 'staff']
            ],
            [
                'name' => 'Manajemen Menu',
                'icon' => 'fas fa-bars',
                'route' => 'menu.index',
                'order' => 2,
                'roles' => ['admin']
            ],
            [
                'name' => 'Manajemen User',
                'icon' => 'fas fa-users',
                'route' => 'pegawai.index',
                'order' => 3,
                'roles' => ['admin']
            ],
            [
                'name' => 'Surat Perintah',
                'icon' => 'fas fa-file-alt',
                'route' => 'sp.index',
                'order' => 4,
                'roles' => ['admin', 'direktur']
            ],
            [
                'name' => 'BAST',
                'icon' => 'fas fa-file-signature',
                'route' => 'bast.index',
                'order' => 5,
                'roles' => ['admin', 'direktur']
            ],
        ];

        foreach ($menus as $menuData) {
            $menu = \App\Models\Menu::create([
                'name' => $menuData['name'],
                'icon' => $menuData['icon'],
                'route' => $menuData['route'],
                'order' => $menuData['order'],
                'is_active' => true
            ]);

            $roles = Role::whereIn('name', $menuData['roles'])->get();
            $menu->roles()->sync($roles);
        }
    }
}
