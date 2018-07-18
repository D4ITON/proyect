<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
   	public function index()
   	{
   		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/prueba-laravel1-firebase-adminsdk-3oaeb-344649b650.json');
		$firebase = (new Factory)
		    ->withServiceAccount($serviceAccount)
		    ->create();
		    $db = $firebase->getDatabase();
		    $db->getReference('users')->set([
		    	'id'=>1,
		    	'name'=>'d4iton',
		    	'email'=>'daitonmh100@gmail.com',
		    	'online'=>1
		    ]);
		    echo '<h1>Los datos han sido registrados satisfactoriamente</h1>';
   	}
}
