<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// PAGINA PRINCIPAL
Route::get('/', function () {
    return view('welcome');
});

// AUTENTICAR RUTAS
Auth::routes();

//RUTA HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTA SOBRE MI
Route::get('/sobremi', [App\Http\Controllers\AboutmeController::class, 'index'])->name('aboutme');

//RUTA DE CONTACTO
Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contact');

// DESPLEGABLE CLIENTES
Route::get('/cuenta', [App\Http\Controllers\CuentaController::class, 'index'])->name('cuenta');

//GALERIA DE PRODUCTOS
Route::get('/discos', [App\Http\Controllers\DiscosController::class, 'index'])->name('discos');
Route::get('/barras-olimpicas', [App\Http\Controllers\BarrasDeportivasController::class, 'index'])->name('barras-olimpicas');
Route::get('/bandas-elasticas', [App\Http\Controllers\BandasElasticasController::class, 'index'])->name('bandas-elasticas');

//RUTA PEDIDOS ( Para cuando hagas la comanda y visualizar que todo esta okey, aqui saldran registrados)
Route::get('/misPedidos',[App\Http\Controllers\MisPedidosController::class, 'index'])->name('misPedidos');


//RUTA ADMINISTRADOR | PANEL DE CONTROL
Route::get('/administracion-de-la-web', [App\Http\Controllers\AdminController::class, 'index'])->name('administracion-de-la-web');

// CLIENTES REGISTRADOS 
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

// PEDIDOS REGISTRADOS DE CLIENTES
Route::resource('comanda', App\Http\Controllers\ComandaController::class);

//TODOS LOS PRODUCTOS EXISTENTES EN LA WEB
Route::resource('producte', App\Http\Controllers\ProducteController::class);

//RUTA CESTA
Route::get('/cesta', [App\Http\Controllers\CestaController::class, 'index'])->name('cesta');

//RUTA GESTION
Route::get('/gestion', [App\Http\Controllers\GestionController::class, 'index'])->name('gestion');


//CONTROLADOR DE ERRROS PAGINAS QUE NOM EXISTEN

Route::get('/error', [App\Http\Controllers\HomeController::class, 'error'])->name('error');

//PAGOS

Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index']);

Route::post('/transaction', [App\Http\Controllers\PaymentController::class, 'makePayment'])->name('make-payment');
