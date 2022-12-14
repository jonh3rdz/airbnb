<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
                ->forgetCachedPermissions();

        $viewHome = 'view Home';

        //Crear Permisos
        Permission::create(['name' => $viewHome]);

        //Define roles
        $superAdmin = 'super-admin';
        $invitado = 'invitado';

        Role::create(['name' => $superAdmin])
                ->givePermissionTo(Permission::all());

        Role::create(['name' => $invitado])
                ->givePermissionTo([
                    $viewHome
                ]);
    }
}
