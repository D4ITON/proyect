<?php

use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();

        $user = User::create([
        	'codigo' => '2015-119063',
        	'name' => 'Dalthon Mamani Hualpa',
        	'email' => 'daitonmh100@gmail.com',
        	// 'password' => '123456',
        	'password' => Hash::make('cntrsnsgr'),
        ]);


        $role = Role::create([
	    	'name' => 'admin',
	    	'display_name' => 'Administrador',
	    	'description' => 'Administrador del sitio',
	    ]);

	    Role::create([
	    	'name' => 'delegado',
	    	'display_name' => 'Delegado',
	    	'description' => 'Delegado de un curso y estudiante',
	    ]);

        Role::create([
	    	'name' => 'estudiante',
	    	'display_name' => 'Estudiante',
	    	'description' => 'Estudiante de varios cursos',
	    ]);



	    $user->roles()->save($role);


    }

}
