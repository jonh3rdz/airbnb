<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\PropertyType\StorePropertyTypeRequest;
use App\Http\Resources\API\V1\PropertyType\PropertyTypeCollection; //index
use App\Http\Resources\API\V1\PropertyType\PropertyTypeResource; //show
use App\Models\API\V1\PropertyType; //modelo
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
        //$validated = $request->validated();
        //$propertyType = PropertyType::create($request->all());

        /*$propertyType = new PropertyType($request->all());
        if ($request->hasFile('icon_image')) 
        {
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
        ],201);*/
        
        if($request->hasFile("icon_image")){
            $file=$request->file("icon_image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("/public/property_type/"),$imageName);

            //$propertyType = new PropertyType($request->all());
            $propertyType =new PropertyType([
                "title" =>$request->title,
                "description" =>$request->description,
                "status" =>$request->status,
                "icon_image" =>$imageName,
            ]);

           $propertyType->save();
        }
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $propertyType, //retorna toda la data en $propertyType
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(PropertyType $PropertyTypeId)
    {
        //return $propertyType;
        /*return response()->json([
            'res' => true,
            'property Type' => $propertyType
        ],200);*/
        return response()->json(new PropertyTypeResource($PropertyTypeId),200);
    }

    public function update(Request $request, PropertyType $PropertyTypeId)
    {
        /*$propertyType = PropertyType::findOrFail($propertyType);
        if ($request->hasFile('icon_image')){
            if (File::exists("property_type/".$propertyType->icon_image))
            {
                File::delete("property_type/".$propertyType->icon_image);
            }
            //$file=$request->file("cover");
            $image = $request->file('icon_image');
            
            $ext = $image->extension();
            $propertyType->icon_image = time().'.'.$ext; //nombre de archivo
            $image->storeAs('public/property_type', $propertyType->icon_image);//ruta a guardar archivo
            //$propertyType->icon_image = $file;
            $request['icon_image'] = $propertyType->icon_image;
        }
        $propertyType->update($request->all());*/

        $post=PropertyType::findOrFail($PropertyTypeId);
     if($request->hasFile("icon_image")){
         if (File::exists("icon_image/".$post->icon_image)) {
             File::delete("icon_image/".$post->icon_image);
         }
         $file=$request->file("icon_image");
         $post->icon_image=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/public/property_type/"),$post->icon_image);
         $request['icon_image']=$post->icon_image;
     }
     //$propertyType->update($request->all());
     $PropertyTypeId->update([
        "title" =>$request->title,
        "description"=>$request->description,
        "icon_image"=>$post->icon_image,
        "status"=>$request->status,
    ]);
    }

    public function destroy(PropertyType $PropertyTypeId)
    {
        $PropertyTypeId->delete();

        return response()->json([
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
