<?php

use App\Http\Controllers\NotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NotaController::class, 'index']);
