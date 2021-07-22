<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ventasfinalesController;


/*ruta de inicio de la plataforma de laravel*/
Route::get('/',[App\Http\Controllers\RutaController::class,'index'])->name('publico');

Auth::routes();

/*seccion donde se especifica  todas las rutas que se van a a usar en la parte usuario o cliente*/
Route::resource('comentar',App\Http\Controllers\cliente\ComentarioController::class)->middleware('auth');
Route::get('cliente/comentarios',[App\Http\Controllers\cliente\ComentarioController::class,'index'])->name('comenta')->middleware('auth');

Route::resource('informacion',App\Http\Controllers\cliente\InformacionController::class)->middleware('auth');
Route::get('cliente/informacions',[App\Http\Controllers\cliente\InformacionController::class,'index'])->name('informa')->middleware('auth');

Route::resource('ruta',App\Http\Controllers\cliente\RutaController::class)->middleware('auth');
Route::get('cliente/rutas',[App\Http\Controllers\cliente\RutaController::class,'index'])->name('inicio')->middleware('auth');

Route::resource('clientee',App\Http\Controllers\cliente\ClienteController::class)->middleware('auth');
Route::get('cliente/clientes',[App\Http\Controllers\cliente\ClienteController::class,'index'])->name('client')->middleware('auth');

Route::resource('reserva',App\Http\Controllers\cliente\ReservaController::class)->middleware('auth');
Route::get('cliente/reservas',[App\Http\Controllers\cliente\ReservaController::class,'index'])->name('reservaindex')->middleware('auth');

Route::resource('promocion',App\Http\Controllers\cliente\PromocioneController::class)->middleware('auth');
Route::get('cliente/promociones',[App\Http\Controllers\cliente\PromocioneController::class,'index'])->name('promocione')->middleware('auth');

Route::resource('reservasproms',App\Http\Controllers\cliente\ReservaspromoController::class)->middleware('auth');
Route::get('reservaspromo',[App\Http\Controllers\cliente\ReservaspromoController::class,'index'])->name('reservasp')->middleware('auth');



/*sector donde se especifica todas las rutas de la parte administrativa*/
Route::resource('comentarios',App\Http\Controllers\administrador\ComentarioController::class)->middleware('auth');
Route::get('comentarios',[App\Http\Controllers\administrador\ComentarioController::class,'index'])->name('comentarios')->middleware('auth');

Route::resource('administrador/informacions',App\Http\Controllers\administrador\InformacionController::class)->middleware('auth');
Route::get('administrador/informacions',[App\Http\Controllers\administrador\InformacionController::class,'index'])->name('informacion')->middleware('auth');

Route::resource('administrador/rutas',App\Http\Controllers\administrador\RutaController::class)->middleware('auth');
Route::get('administrador/rutas',[App\Http\Controllers\administrador\RutaController::class,'index'])->name('rutas')->middleware('auth');



Route::resource('administrador/equipos',App\Http\Controllers\administrador\EquipoController::class)->middleware('auth');
Route::get('administrador/equipos',[App\Http\Controllers\administrador\EquipoController::class,'index'])->name('equipos')->middleware('auth');

Route::resource('administrador/clientes',App\Http\Controllers\administrador\ClienteController::class)->middleware('auth');
Route::get('administrador/clientes',[App\Http\Controllers\administrador\ClienteController::class,'index'])->name('clientes')->middleware('auth');

Route::resource('user',App\Http\Controllers\administrador\UserController::class)->middleware('auth');
Route::get('administrador/user',[App\Http\Controllers\administrador\UserController::class,'index'])->name('cliente')->middleware('auth');

Route::resource('administrador/reservas',App\Http\Controllers\administrador\ReservaController::class)->middleware('auth');
Route::get('administrador/reservas',[App\Http\Controllers\administrador\ReservaController::class,'index'])->name('reservas')->middleware('auth');

//reservas normales realizadas
Route::resource('reservasrealizad',App\Http\Controllers\administrador\ReservasrealizadasController::class)->middleware('auth');
Route::get('administrador/reservasrealizadas',[App\Http\Controllers\administrador\ReservasrealizadasController::class,'index'])->name('reservasrealizada')->middleware('auth');

//reservas normales Perdidas y canceladas
Route::resource('reservasperdidas',App\Http\Controllers\administrador\ReservasperdidasController::class)->middleware('auth');
Route::get('administrador/reservasperdidas',[App\Http\Controllers\administrador\ReservasperdidasController::class,'index'])->name('reservasperdida')->middleware('auth');


Route::resource('administrador/promociones',App\Http\Controllers\administrador\PromocioneController::class)->middleware('auth');
Route::get('administrador/promociones',[App\Http\Controllers\administrador\PromocioneController::class,'index'])->name('promociones')->middleware('auth');

//reservas de promocion
Route::resource('reservaspromos',App\Http\Controllers\administrador\ReservaspromoController::class)->middleware('auth');
Route::get('administrador/reservaspromo',[App\Http\Controllers\administrador\ReservaspromoController::class,'index'])->name('reservasprom')->middleware('auth');

//reservas promocion realizadas
Route::resource('reservapromorealizada',App\Http\Controllers\administrador\ReservaspromorealizadasController::class)->middleware('auth');
Route::get('administrador/reservaspromorealizadas',[App\Http\Controllers\administrador\ReservaspromorealizadasController::class,'index'])->name('reserproindex')->middleware('auth');


//reservas promocion perdidas y canceladas
Route::resource('reservapromoperdida',App\Http\Controllers\administrador\ReservaspromoperdidasController::class)->middleware('auth');
Route::get('administrador/reservaspromoperdidas',[App\Http\Controllers\administrador\ReservaspromoperdidasController::class,'index'])->name('reservapromoperdidaindex')->middleware('auth');

//ventas de servicios turistico promociones
Route::resource('ventas',App\Http\Controllers\administrador\VentaController::class)->middleware('auth');
Route::get('Administrador/ventas',[App\Http\Controllers\administrador\VentaController::class,'index'])->name('ventapromocion')->middleware('auth');

//ventas de servicios turisticos normal
Route::resource('ventascomunn',App\Http\Controllers\administrador\VentascomuneController::class)->middleware('auth');
Route::get('Administrador/ventascomunes',[App\Http\Controllers\administrador\VentascomuneController::class,'index'])->name('ventacomun')->middleware('auth');


/*rutas para validar si el usuario ingresado es administrador o si es cliente*/
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', UserController::class);


/*definicion de rutas que se van a mostrar al publico este no requiere validacion de <usuario></usuario*/

Route::get('rutapublico',[App\Http\Controllers\RutaController::class,'index'])->name('publico');
Route::get('informacions',[App\Http\Controllers\InformacionController::class,'index'])->name('infoempresa');

