<?php

use App\Http\Controllers\CepController\CepController;
use Illuminate\Support\Facades\Route;

Route::prefix('cep')->group(function () {
    Route::get('via-cep', [CepController::class, 'ViaCEP']);
});

