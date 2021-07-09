<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class administrador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
$useradmin=User::create([
    'imagen'=>'',
	'name' => 'administrador',
    'edad' => '18',
    'dui' => '000000004',
    'telefono' => '72895869',
    'rol' => 'administrador',
	'email' => 'admin@gmail.com',
	'password' => Hash::make('admin'),

	]);
            
$user=User::create([
    'imagen'=>'',
	'name' => 'cliente',
    'edad' => '20',
    'dui' => '000000005',
    'telefono' => '72895868',
    'rol' => '',
	'email' => 'cliente@gmail.com',
	'password' => Hash::make('cliente'),

	]);
    }
}