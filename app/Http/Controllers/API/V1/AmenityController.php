<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Amenity\StoreAmenityRequest;
use App\Http\Requests\API\V1\Amenity\UpdateAmenityRequest;
use App\Http\Resources\API\V1\Amenity\AmenityCollection;
use App\Http\Resources\API\V1\Amenity\AmenityResource;
use App\Models\API\V1\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AmenityController extends Controller
{
    public function index()
    {
        return new AmenityCollection(Amenity::all());
    }

    public function store(StoreAmenityRequest $request)
    {
        $Amenity = new Amenity($request->all());

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Amenity', $file);
            $Amenity->icon_image = $file;
        }

        $Amenity->save();

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Amenity, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(Amenity $AmenityId)
    {
        return response()->json(new AmenityResource($AmenityId),200);
    }

    public function update(UpdateAmenityRequest $request, $AmenityId)
    {
        $Amenity = Amenity::findOrFail($AmenityId);
        if ($request->hasFile('icon_image')){
            if (File::exists("storage/Amenity/".$Amenity->icon_image)) {
                File::delete("storage/Amenity/".$Amenity->icon_image);
            }
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Amenity', $file);
            $Amenity->icon_image = $file;

            $request['icon_image'] = $Amenity->icon_image;
        }
        
        $Amenity->update([$request->all(),
        "icon_image"=>$Amenity->icon_image,]);
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Amenity, //retorna toda la data
            'msg' => 'Actualizado correctamente' //Retorna un mensaje
        ],200);
    }

    public function destroy(Amenity $request, $AmenityId)
    {
        $Amenity = Amenity::findOrFail($AmenityId);
        
        if (File::exists("storage/Amenity/".$Amenity->icon_image)) {
            File::delete("storage/Amenity/".$Amenity->icon_image);
        }

        $Amenity->delete();
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Amenity, //retorna toda la data
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
