<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Dueño', 'Gerente', 'supervisor', 'Digitador','Operario','ventas'];

        foreach ($roles as $rol) {
            Role::firstOrCreate(['name' => $rol]);
        }
    }
}
