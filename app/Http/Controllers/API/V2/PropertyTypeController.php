<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\PropertyType\StorePropertyTypeRequest; //Store
use App\Http\Requests\API\V1\PropertyType\UpdatePropertyTypeRequest; //Update
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

    public function store(StorePropertyTypeRequest $request)
    {
        $propertytype = new PropertyType();
        $propertytype->title = $request->title;
        $propertytype->description = $request->description;
        $propertytype->icon_image = $request->icon_image;
        $propertytype->status = $request->status;

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/icon_image', $file);
            $propertytype->icon_image = $file;
        }

        $propertytype->save();
        /*return (new PropertyResource($property))
                ->additional(['msg' => 'Propiedad guardado correctamente']);*/

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $propertytype, //retorna toda la data en $propertyType
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
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

    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType)
    {
        $propertyType->update($request->all());

        return response()->json([
            'res' => true,
            'Propiedad actualizado correctamente',
        ],200);
        /*return (new PropertyResource($property))
                ->additional(['msg' => 'Propiedad actualizado correctamente'])
                ->response()
                ->setStatusCode(202);*/
    }

    public function destroy($id)
    {
        //
    }
}
