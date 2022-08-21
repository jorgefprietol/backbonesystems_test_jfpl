<?php

use App\Http\Controllers\CodigosPostalesController;
use Illuminate\Support\Facades\Route;

Route::get('/zip-codes/{zip_code}', [CodigosPostalesController::class, 'getByCodigoPostal']);
