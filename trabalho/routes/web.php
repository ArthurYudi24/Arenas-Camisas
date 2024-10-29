<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisasTimeController;
use App\Http\Controllers\AuthController;


Route::middleware('auth')->group(function () {
    
    Route::get("/", [CamisasTimeController::class, "index"])->name("home");

});

Route::get("/admCamisas", [CamisasTimeController::class, "indexAdm"])->name("camisas_index");

Route::post('/admCamisas', [ CamisasTimeController::class, 'IncluirCamisa' ]);
Route::get("/admCamisas/exc/{id}", [ CamisasTimeController::class, 'ExcluirCamisa' ])->name('camisas_ex');
Route::get("/admCamisas/upd/{id}", [ CamisasTimeController::class, 'BuscarAlteracao' ])->name('camisas_upd');
Route::post('/admCamisas/upd', [ CamisasTimeController::class, 'ExecutaAlteracao' ]);

Route::get("/registrar", function(){
    return view("admin_layout.registrar");
})->name('registrar');

Route::post("/registrar", [ AuthController::class, 'register' ]);

Route::get("/login", function(){
    return view("admin_layout.login");
})->name("login");
Route::post("/login", [ AuthController::class, 'login' ]);


