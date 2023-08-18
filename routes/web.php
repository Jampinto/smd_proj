<?php

use App\Mail\EmailSmd;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'main@index') ->name('index'); 
Route::get('/login', 'main@login')->name('login');
Route::post('/login_submit', 'main@login_submit')->name('login_submit');
Route::get('/home', 'main@home') -> name('home');
Route::get('/logout', 'main@logout') -> name('logout');

Route::get('/homeutente', 'utentecontroller@home') -> name('homeutente');
Route::get('/novo_utente', 'utentecontroller@novo_utente') -> name('novo_utente');
Route::post('/novo_utente_submit', 'utentecontroller@novo_utente_submit') -> name('novo_utente_submit');

//ÍCONES
Route::get('/edit_utente/{id}', 'utentecontroller@edit_utente') -> name('edit_utente');
Route::post('/edit_utente_submit', 'utentecontroller@edit_utente_submit') -> name('edit_utente_submit');
Route::delete('/delete_utente{id}', 'utentecontroller@delete_utente') -> name('delete_utente');

//CONSULTA
Route::get('/registar_consulta/{id}', 'utentecontroller@registar_consulta') -> name('registar_consulta');
Route::post('/registar_consulta_submit', 'utentecontroller@registar_consulta_submit') -> name('registar_consulta_submit');
Route::post('/registar_medicina_submit', 'utentecontroller@registar_medicina_submit') -> name('registar_medicina_submit');
Route::get('/ver_consulta{id}', 'utentecontroller@ver_consulta') -> name('ver_consulta');

//EMAIL
Route::get('/mail', 'utentecontroller@envioEmails') -> name('envio_emails');

Route::get('/temp', 'main@temp'); 
//Route::get('usuarios_login', 'usuariosController@ApresentarFormularioLogin');

//Route::get('/usuarios_login', [App\Http\Controllers\usuariosController::class, 'ApresentarFormularioLogin'])->name('home');