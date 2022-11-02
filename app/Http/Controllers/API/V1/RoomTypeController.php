<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\RoomType\StoreRoomTypeRequest;
use App\Http\Requests\API\V1\RoomType\UpdateRoomTypeRequest;
use App\Http\Resources\API\V1\RoomType\RoomTypeCollection;
use App\Http\Resources\API\V1\RoomType\RoomTypeResource;
use App\Models\API\V1\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomTypeController extends Controller
{
    public function index()
    {
        return new RoomTypeCollection(RoomType::all());
    }

    public function store(StoreRoomTypeRequest $request)
    {
        $RoomType = new RoomType($request->all());

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/RoomType', $file);
            $RoomType->icon_image = $file;
        }

        $RoomType->save();

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $RoomType, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(RoomType $RoomTypeId)
    {
        return response()->json(new RoomTypeResource($RoomTypeId),200);
    }

    public function update(UpdateRoomTypeRequest $request, $RoomTypeId)
    {
        $RoomType = RoomType::findOrFail($RoomTypeId);
        if ($request->hasFile('icon_image')){
            if (File::exists("storage/RoomType/".$RoomType->icon_image)) {
                File::delete("storage/RoomType/".$RoomType->icon_image);
            }
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/RoomType', $file);
            $RoomType->icon_image = $file;

            $request['icon_image'] = $RoomType->icon_image;
        }
        
        $RoomType->update([$request->all(),
        "icon_image"=>$RoomType->icon_image,]);
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $RoomType, //retorna toda la data
            'msg' => 'Actualizado correctamente' //Retorna un mensaje
        ],200);
    }

    public function destroy(RoomType $request, $RoomTypeId)
    {
        $RoomType = RoomType::findOrFail($RoomTypeId);
        
        if (File::exists("storage/RoomType/".$RoomType->icon_image)) {
            File::delete("storage/RoomType/".$RoomType->icon_image);
        }

        $RoomType->delete();
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $RoomType, //retorna toda la data
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
