<?php

use App\User;
use App\category;
use App\generarVerificationToken;
use App\product;
use App\seller;
use App\transaction;
use Faker\Generator;
use Faker\Provider\numberBetween;
use Faker\Provider\paragraph;
use Faker\Provider\randomElement;
use Faker\Provider\unique;
use Illuminate\Auth\Access\define;
use Illuminate\Support\random;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verified' => $verificado = $faker ->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(),
        'admin' => $faker ->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR]),
    ];
});


/*
// factory category
*/
$factory->define(category::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        
    ];
});


/*
// factory product
*/
$factory->define(product::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity'=> $faker ->numberBetween(1,10),
        'status'=>$faker ->randomElement([product::PRODUCTO_DISPONIBLE, product::PRODUCTO_NO_DISPONIBLE]),
        'image' => $faker ->randomElement(['1.jpg, 2.jpg, 3.jpg']),
        // 'seller_id' => User::inRandomOrder()->first()->id,
        'seller_id' => User::all()->random()->id,
    ];
});


/*
// factory transaction
*/
$factory->define(transaction::class, function (Faker\Generator $faker) {
    $vendedor = seller::has('products')->get()->random();
    $comprador =User::all()->except($vendedor->id)->random();

    return [
        
        'quantity' => $faker->numberBetween(1,3),
        'buyer_id'=> $comprador->id,
        'product_id'=> $vendedor ->products->random()->id,
       
    ];
});

