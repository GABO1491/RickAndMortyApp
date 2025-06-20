<?php

use App\Http\Controllers\CharacterController;

Route::get('/', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/fetch', [CharacterController::class, 'fetchAndSave'])->name('characters.fetch');
Route::get('/characters/{id}', [CharacterController::class, 'show'])->name('characters.show');


Route::get('/characters/{id}/edit', [CharacterController::class, 'edit'])->name('characters.edit');
Route::put('/characters/{id}', [CharacterController::class, 'update'])->name('characters.update');