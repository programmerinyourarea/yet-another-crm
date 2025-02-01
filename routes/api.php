<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;

Route::apiResource('projects', ProjectController::class);
