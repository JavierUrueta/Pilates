<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role2= Role::create(['name' => 'Admin']);
        DB::table('users')->insert([
            'name' => 'Javier Urueta',
            'email' => 'javis_javis2000@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user=User::find(1);
        $user->assignRole('Admin');
    }
}
