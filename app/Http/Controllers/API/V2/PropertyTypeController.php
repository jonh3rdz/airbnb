<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\PropertyType\StorePropertyTypeRequest; //Store
use App\Http\Resources\API\V1\PropertyType\PropertyTypeCollection; //Index
use App\Http\Resources\API\V1\PropertyType\PropertyTypeResource; //Show
use App\Models\API\V1\PropertyType; //Modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyTypeController extends Controller
{
    public function index()
    {
        return new PropertyTypeCollection(PropertyType::all());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(PropertyType $propertyType)
    {
        //return $propertyType;
        /*return response()->json([
            'res' => true,
            'property Type' => $id
        ],200);*/
        //return PropertyType::find($id);
        return response()->json(new PropertyTypeResource($propertyType),200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
