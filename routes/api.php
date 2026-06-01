<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

Route::get("/cruds", [CrudController::class, "index"]);
Route::get("/cruds/create", [CrudController::class, "create"]);
Route::put("/cruds/{id}", [CrudController::class, "update"]);
Route::delete("/cruds/{id}", [CrudController::class, "destroy"]);
