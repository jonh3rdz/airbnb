<?php

use App\Http\Controllers\API\V1\CountriesController as CountriesV1;
use App\Http\Controllers\API\V1\PropertyTypeController as PropertyTypeV1;
use App\Http\Controllers\API\V2\PropertyTypeController as PropertyTypeV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Property Type Version 1
Route::get('v1/propertiestypes', [PropertyTypeV1::class,'index']);
Route::post('v1/propertiestypes', [PropertyTypeV1::class,'store']);
Route::get('v1/propertiestypes/{propertyType}', [PropertyTypeV1::class,'show']);
Route::put('v1/propertiestypes/{propertyType}', [PropertyTypeV1::class,'update']);
Route::delete('v1/propertiestypes/{propertyType}', [PropertyTypeV1::class,'destroy']);
//Property Type Version 2
Route::get('v2/propertiestypes', [PropertyTypeV2::class,'index']);
Route::post('v2/propertiestypes', [PropertyTypeV2::class,'store']);
Route::get('v2/propertiestypes/{propertyType}', [PropertyTypeV2::class,'show']);
Route::put('v2/propertiestypes/{propertyType}', [PropertyTypeV2::class,'update']);
Route::delete('v2/propertiestypes/{propertyType}', [PropertyTypeV2::class,'destroy']);
//Route::apiResource('v1/propertiestypes', App\Http\Controllers\API\V1\PropertyTypeController::class);

//countries Version 1
Route::get('v1/countries', [CountriesV1::class,'index']);
Route::post('v1/countries', [CountriesV1::class,'store']);
Route::get('v1/countries/{countries}', [CountriesV1::class,'show']);
Route::put('v1/countries/{countries}', [CountriesV1::class,'update']);
Route::delete('v1/countries/{countries}', [CountriesV1::class,'destroy']);