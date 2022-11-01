<?php

use App\Http\Controllers\API\V1\PropertyTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('v1/propertiestypes', [PropertyTypeController::class,'index']);
Route::post('v1/propertiestypes', [PropertyTypeController::class,'store']);
Route::get('v1/propertiestypes/{propertyType}', [PropertyTypeController::class,'show']);
Route::delete('v1/propertiestypes/{propertyType}', [PropertyTypeController::class,'destroy']);
//Route::apiResource('v1/propertiestypes', App\Http\Controllers\API\V1\PropertyTypeController::class);