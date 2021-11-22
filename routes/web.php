<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\KonectaController;

Cache::flush();
Session::flush();
Artisan::call('cache:clear');

Route::get('/',[KonectaController::class, 'Home'])->name('home');

Route::post('crearProducto',[KonectaController::class, 'CrearProducto'])->name('crearProducto');
