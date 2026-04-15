<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', fn() => redirect('/siswa'));

// SISWA CRUD
Route::get('/siswa',              [SiswaController::class, 'index']);
Route::get('/siswa/create',       [SiswaController::class, 'create']);
Route::post('/siswa',             [SiswaController::class, 'store']);
Route::get('/siswa/{id}/edit',    [SiswaController::class, 'edit']);
Route::put('/siswa/{id}',         [SiswaController::class, 'update']);
Route::delete('/siswa/{id}',      [SiswaController::class, 'destroy']);

// JOIN VIEW
Route::get('/siswa/nilai',        [SiswaController::class, 'nilaiSiswa']);

// NILAI CRUD
Route::get('/nilai/create',       [NilaiController::class, 'create']);
Route::post('/nilai',             [NilaiController::class, 'store']);
Route::delete('/nilai/{id}',      [NilaiController::class, 'destroy']);