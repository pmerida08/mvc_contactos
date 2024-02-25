<?php

use App\Controllers\ContactController;
use Lib\Route;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/contacts', [ContactController::class, 'index']);

Route::get('/contacts/create', [ContactController::class, 'create']);

Route::post('/contacts', [ContactController::class, 'store']);

Route::get('/contacts/:id', [ContactController::class, 'show']);

Route::get('/contacts/:id/edit', [ContactController::class, 'edit']);

Route::post('/contacts/:id', [ContactController::class, 'update']);

Route::post('/contacts/:id/delete', [ContactController::class, 'destroy']);

// Route::get('/about', function () {
//     return 'Hola desde la página acerca de';
// });

// Route::get('/courses/php', function () {
//     return 'Hola desde la página de cursos en php';
// });

// El orden de las rutas es importante, si se coloca esta ruta antes de la ruta de arriba, no se podrá acceder a la ruta de arriba

// Route::get('/courses/:slug', function ($slug) {
//     return 'Hola desde la página de cursos en el curso: ' . $slug;
// });



Route::dispatch();
