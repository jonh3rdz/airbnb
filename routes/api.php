<?php

use App\Http\Controllers\API\V1\CategoryController as CategoryV1; //Controlador Version 1, Category
use App\Http\Controllers\API\V1\CityController as CityV1; //Controlador Version 1, City
use App\Http\Controllers\API\V1\CountryController as CountryV1; //Controlador Version 1, Country
use App\Http\Controllers\API\V1\PropertyTypeController as PropertyTypeV1; //Controlador Version 1, PropertyType
use App\Http\Controllers\API\V1\RoomTypeController as RoomTypeV1; //Controlador Version 1, RoomType
use App\Http\Controllers\API\V1\StateController as StateV1; //Controlador Version 1, State
use App\Http\Controllers\API\V2\PropertyTypeController as PropertyTypeV2; //Controlador Version 2, PropertyType
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Property Type Version 1
Route::get('v1/propertiestypes', [PropertyTypeV1::class,'index']);
Route::post('v1/propertiestypes', [PropertyTypeV1::class,'store']);
Route::get('v1/propertiestypes/{PropertyTypeId}', [PropertyTypeV1::class,'show']);
Route::put('v1/propertiestypes/{PropertyTypeId}', [PropertyTypeV1::class,'update']);
Route::delete('v1/propertiestypes/{PropertyTypeId}', [PropertyTypeV1::class,'destroy']);
//Property Type Version 2
Route::get('v2/propertiestypes', [PropertyTypeV2::class,'index']);
Route::post('v2/propertiestypes', [PropertyTypeV2::class,'store']);
Route::get('v2/propertiestypes/{PropertyTypeId}', [PropertyTypeV2::class,'show']);
Route::put('v2/propertiestypes/{PropertyTypeId}', [PropertyTypeV2::class,'update']);
Route::delete('v2/propertiestypes/{PropertyTypeId}', [PropertyTypeV2::class,'destroy']);
//Route::apiResource('v1/propertiestypes', App\Http\Controllers\API\V1\PropertyTypeController::class);

//Country Version 1
Route::get('v1/countries', [CountryV1::class,'index']);
Route::post('v1/countries', [CountryV1::class,'store']);
Route::get('v1/countries/{CountryId}', [CountryV1::class,'show']);
Route::put('v1/countries/{CountryId}', [CountryV1::class,'update']);
Route::patch('v1/countries/{CountryId}', [CountryV1::class,'update']);
Route::delete('v1/countries/{CountryId}', [CountryV1::class,'destroy']);

//Room Type Version 1
Route::get('v1/roomstypes', [RoomTypeV1::class,'index']);
Route::post('v1/roomstypes', [RoomTypeV1::class,'store']);
Route::get('v1/roomstypes/{RoomTypeId}', [RoomTypeV1::class,'show']);
Route::put('v1/roomstypes/{RoomTypeId}', [RoomTypeV1::class,'update']);
Route::delete('v1/roomstypes/{RoomTypeId}', [RoomTypeV1::class,'destroy']);

//State Version 1
Route::get('v1/states', [StateV1::class,'index']);
Route::post('v1/states', [StateV1::class,'store']);
Route::get('v1/states/{StateId}', [StateV1::class,'show']);
Route::put('v1/states/{StateId}', [StateV1::class,'update']);
Route::patch('v1/states/{StateId}', [StateV1::class,'update']);
Route::delete('v1/states/{StateId}', [StateV1::class,'destroy']);

//City Version 1
Route::get('v1/cities', [CityV1::class,'index']);
Route::post('v1/cities', [CityV1::class,'store']);
Route::get('v1/cities/{CityId}', [CityV1::class,'show']);
Route::put('v1/cities/{CityId}', [CityV1::class,'update']);
Route::patch('v1/cities/{CityId}', [CityV1::class,'update']);
Route::delete('v1/cities/{CityId}', [CityV1::class,'destroy']);

//Room Type Version 1
Route::get('v1/categories', [CategoryV1::class,'index']);
Route::post('v1/categories', [CategoryV1::class,'store']);
Route::get('v1/categories/{CategoryId}', [CategoryV1::class,'show']);
Route::put('v1/categories/{CategoryId}', [CategoryV1::class,'update']);
Route::delete('v1/categories/{CategoryId}', [CategoryV1::class,'destroy']);