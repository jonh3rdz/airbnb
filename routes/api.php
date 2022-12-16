<?php

use App\Http\Controllers\API\V1\AmenityController as AmenityV1; //Controlador Version 1, Amenity
use App\Http\Controllers\API\V1\AuthenticationController;
use App\Http\Controllers\API\V1\CategoryController as CategoryV1; //Controlador Version 1, Category
use App\Http\Controllers\API\V1\CityController as CityV1; //Controlador Version 1, City
use App\Http\Controllers\API\V1\CountryController as CountryV1; //Controlador Version 1, Country
use App\Http\Controllers\API\V1\PropertyController as PropertyV1; //Controlador Version 1, Property
use App\Http\Controllers\API\V1\PropertyTypeController as PropertyTypeV1; //Controlador Version 1, PropertyType
use App\Http\Controllers\API\V1\RoomTypeController as RoomTypeV1; //Controlador Version 1, RoomType
use App\Http\Controllers\API\V1\StateController as StateV1; //Controlador Version 1, State
use App\Http\Controllers\API\V1\SubcategoryController as SubcategoryV1; //Controlador Version 1, Subcategory
use App\Http\Controllers\API\V2\PropertyTypeController as PropertyTypeV2; //Controlador Version 2, PropertyType
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix'=>'v1'],
function(){
    //Register Version 1
    Route::post('register', [AuthenticationController::class,'register']);
    //Login Version 1
    Route::post('login', [AuthenticationController::class,'login']);
    //Home
    Route::get('home', [PropertyV1::class,'index']);
    Route::get('home/{PropertyId}', [PropertyV1::class,'show']);
});

//Route::group(['prefix'=>'v1'],
Route::group(['prefix'=>'v1','middleware'=> ['auth:sanctum']],
function(){
    //
    Route::get('homeusers', [PropertyV1::class,'propertyuser']);
    //cerrar sesion
    Route::post('cerrarsesion',[AuthenticationController::class,'cerrarSesion']);

    //Property Type Version 1
    Route::get('propertiestypes', [PropertyTypeV1::class,'index']);
    Route::post('propertiestypes', [PropertyTypeV1::class,'store']);
    Route::get('propertiestypes/{PropertyTypeId}', [PropertyTypeV1::class,'show']);
    Route::put('propertiestypes/{PropertyTypeId}', [PropertyTypeV1::class,'update']);
    Route::delete('propertiestypes/{PropertyTypeId}', [PropertyTypeV1::class,'destroy']);

    //Route::apiResource('v1/propertiestypes', App\Http\Controllers\API\V1\PropertyTypeController::class);

    //Country Version 1
    Route::get('countries', [CountryV1::class,'index']);
    Route::post('countries', [CountryV1::class,'store']);
    Route::get('countries/{CountryId}', [CountryV1::class,'show']);
    Route::put('countries/{CountryId}', [CountryV1::class,'update']);
    Route::patch('countries/{CountryId}', [CountryV1::class,'update']);
    Route::delete('countries/{CountryId}', [CountryV1::class,'destroy']);

    //Room Type Version 1
    Route::get('roomstypes', [RoomTypeV1::class,'index']);
    Route::post('roomstypes', [RoomTypeV1::class,'store']);
    Route::get('roomstypes/{RoomTypeId}', [RoomTypeV1::class,'show']);
    Route::put('roomstypes/{RoomTypeId}', [RoomTypeV1::class,'update']);
    Route::delete('roomstypes/{RoomTypeId}', [RoomTypeV1::class,'destroy']);

    //State Version 1
    Route::get('states', [StateV1::class,'index']);
    Route::post('states', [StateV1::class,'store']);
    Route::get('states/{StateId}', [StateV1::class,'show']);
    Route::put('states/{StateId}', [StateV1::class,'update']);
    Route::patch('states/{StateId}', [StateV1::class,'update']);
    Route::delete('states/{StateId}', [StateV1::class,'destroy']);

    //City Version 1
    Route::get('cities', [CityV1::class,'index']);
    Route::post('cities', [CityV1::class,'store']);
    Route::get('cities/{CityId}', [CityV1::class,'show']);
    Route::put('cities/{CityId}', [CityV1::class,'update']);
    Route::patch('cities/{CityId}', [CityV1::class,'update']);
    Route::delete('cities/{CityId}', [CityV1::class,'destroy']);

    //Category Version 1
    Route::get('categories', [CategoryV1::class,'index']);
    Route::post('categories', [CategoryV1::class,'store']);
    Route::get('categories/{CategoryId}', [CategoryV1::class,'show']);
    Route::put('categories/{CategoryId}', [CategoryV1::class,'update']);
    Route::delete('categories/{CategoryId}', [CategoryV1::class,'destroy']);

    //Subcategory Version 1
    Route::get('subcategories', [SubcategoryV1::class,'index']);
    Route::post('subcategories', [SubcategoryV1::class,'store']);
    Route::get('subcategories/{SubcategoryId}', [SubcategoryV1::class,'show']);
    Route::put('subcategories/{SubcategoryId}', [SubcategoryV1::class,'update']);
    Route::delete('subcategories/{SubcategoryId}', [SubcategoryV1::class,'destroy']);

    //Amenity Version 1
    Route::get('amenities', [AmenityV1::class,'index']);
    Route::post('amenities', [AmenityV1::class,'store']);
    Route::get('amenities/{AmenityId}', [AmenityV1::class,'show']);
    Route::put('amenities/{AmenityId}', [AmenityV1::class,'update']);
    Route::delete('amenities/{AmenityId}', [AmenityV1::class,'destroy']);

    //Property Version 1
    Route::get('properties', [PropertyV1::class,'index']);
    Route::post('properties', [PropertyV1::class,'store']);
    Route::post('propertiesrole/{PropertyId}', [PropertyV1::class,'updaterole']);
    Route::get('properties/{PropertyId}', [PropertyV1::class,'show']); 
    Route::put('properties/{PropertyId}', [PropertyV1::class,'update']);
    Route::delete('properties/{PropertyId}', [PropertyV1::class,'destroy']);
});

Route::group(['prefix'=>'v2','middleware'=> ['auth:sanctum']],
function(){
    //Property Type Version 2
    Route::get('propertiestypes', [PropertyTypeV2::class,'index']);
    Route::post('propertiestypes', [PropertyTypeV2::class,'store']);
    Route::get('propertiestypes/{PropertyTypeId}', [PropertyTypeV2::class,'show']);
    Route::put('propertiestypes/{PropertyTypeId}', [PropertyTypeV2::class,'update']);
    Route::delete('propertiestypes/{PropertyTypeId}', [PropertyTypeV2::class,'destroy']);
});