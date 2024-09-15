<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // $roles = [
        //     'admin' => ['manage players', 'manage coaches', 'manage events', 'manage stats'],
        //     'user' => [],
        // ];

        // foreach ($roles as $roleName => $permissions) {
        //     $role = Role::firstOrCreate(['name' => $roleName]);

        //     foreach ($permissions as $permissionName) {
        //         $permission = Permission::firstOrCreate(['name' => $permissionName]);
        //         $role->givePermissionTo($permission);
        //     }
        // }

        // Assigner le rôle admin à l'utilisateur
        $admin = User::where('email', 'sadik@gmail.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }

        // Assigner le rôle utilisateur à un utilisateur classique
        $user = User::where('email', 'user@example.com')->first();
        if ($user) {
            $user->assignRole('user');
        }
    }
}
