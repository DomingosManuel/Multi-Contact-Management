<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PessoasController;
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
Route::get('/pulic/{id}', [PessoasController::class,'visu']);
Route::get('/',[PessoasController::class,'index']);
Route::get('/sigle/{id}',[PessoasController::class,'ver'])->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[ContactoController::class,'admin'])->name('dashboard');
Route::get('/edit/{id}',[PessoasController::class,'upd'])->middleware('auth');
Route::get('/editar/{id}',[ContactoController::class,'upd'])->middleware('auth');
Route::get('/add/{id}',[ContactoController::class,'add'])->name('add.add')->middleware('auth');
Route::post('/add/{id}',[ContactoController::class,'store'])->middleware('auth');
Route::get('rest',[ContactoController::class,'restauro'])->name('rest.restauro');
//ADMIN ÁREA
Route::prefix('/admin')->group(function (){
     
    Route::get('/',[PessoasController::class,'meus'])->middleware('auth');
    Route::get('/contactos',[PessoasController::class,'todos'])->middleware('auth');
    Route::get('/addpessoa',[PessoasController::class,'add'])->middleware('auth');
    Route::post('/addpessoa',[PessoasController::class,'store'])->middleware('auth');
    Route::get('/edit/{id}',[PessoasController::class,'update'])->middleware('auth');
    Route::get('/editar/{id}',[ContactoController::class,'update'])->middleware('auth');
    Route::get('/delete/{id}',[PessoasController::class,'destroy'])->middleware('auth');
    Route::get('/apagar/{id}',[ContactoController::class,'destroy'])->middleware('auth');
    Route::get('/rest/{id}',[PessoasController::class,'retaurar'])->middleware('auth');
    Route::get('/eliminar/{id}',[PessoasController::class,'eliminar'])->middleware('auth');
});