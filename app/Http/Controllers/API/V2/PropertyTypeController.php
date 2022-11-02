<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\PropertyType\StorePropertyTypeRequest; //Store
use App\Http\Requests\API\V1\PropertyType\UpdatePropertyTypeRequest;
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
        $propertytype = new PropertyType($request->all());

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/icon_image', $file);
            $propertytype->icon_image = $file;
        }

        $propertytype->save();

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

    public function update(UpdatePropertyTypeRequest $request, $id)
    {
        $propertytype = PropertyType::findOrFail($id);
        if ($request->hasFile('icon_image')){
            if (File::exists("storage/icon_image/".$propertytype->icon_image)) {
                File::delete("storage/icon_image/".$propertytype->icon_image);
            }
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/icon_image', $file);
            $propertytype->icon_image = $file;

            $request['icon_image'] = $propertytype->icon_image;
        }
        
        $propertytype->update([$request->all(),
        "icon_image"=>$propertytype->icon_image,]);
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $propertytype, //retorna toda la data en $propertyType
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],200);
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
