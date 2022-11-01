<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\PropertyType\StorePropertyTypeRequest;
use App\Http\Resources\API\V1\PropertyType\PropertyTypeCollection; //index
use App\Http\Resources\API\V1\PropertyType\PropertyTypeResource; //show
use App\Models\API\V1\PropertyType; //modelo
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        return new PropertyTypeCollection(PropertyType::all());
    }

    public function store(StorePropertyTypeRequest $request)
    {
        //$validated = $request->validated();
        //$propertyType = PropertyType::create($request->all());

        $propertyType = new PropertyType($request->all());
        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext; //nombre de archivo
            $image->storeAs('public/property_type', $file);//ruta a guardar archivo
            $propertyType->icon_image = $file;
        }
        $propertyType->save(); //Guarda todo
        //Se almacena en la siguiente direccion
        //http://127.0.0.1:8000/storage/property_type/1667330899.jpg
        //dominio + storage + carpeta-almacenamieno + nombre-archivo
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $propertyType, //retorna toda la data en $propertyType
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(PropertyType $propertyType)
    {
        //return $propertyType;
        /*return response()->json([
            'res' => true,
            'property Type' => $propertyType
        ],200);*/
        return response()->json(new PropertyTypeResource($propertyType),200);
    }

    public function update(Request $request, PropertyType $propertyType)
    {
        //
    }

    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();

        return response()->json([
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
