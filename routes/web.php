<?php

use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
    Route::get('tools', function () {
        return Inertia::render('tools');
    })->name('tools');

Route::get('/tools', [ToolsController::class, 'index'])->name('tools.index');
Route::get('/tools/add', [ToolsController::class, 'create'])->name('tools.add');

Route::post('/tools', [ToolsController::class, 'store']);

});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
