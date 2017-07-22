<?php

use App\User;
use App\category;
use App\product;
use App\transaction;
use Illuminate\Database\Query\truncate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
    	User::truncate();
    	category::truncate();
    	product::truncate();
    	transaction::truncate();
    	DB::table('category_product')->truncate();

    	$cantidadUsuarios = 200;
    	$cantidadCategorias = 30;
    	$cantidadProductos = 1000;
    	$cantidadTransacciones = 1000;

    	factory(User::class, $cantidadUsuarios)->create();
		factory(category::class, $cantidadCategorias)->create();


    	factory(product::class, $cantidadTransacciones)->create()->each(
    		function ($producto) {
    			$categorias = category::all()->random(mt_rand(1, 5))->pluck('id');

    			$producto->categories()->attach($categorias);
    		}

    		);


    	factory(transaction::class, $cantidadTransacciones)->create();
    }
}
