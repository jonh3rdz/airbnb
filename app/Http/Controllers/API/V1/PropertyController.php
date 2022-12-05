<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Property\StorePropertyRequest;
use App\Http\Requests\API\V1\Property\UpdatePropertyRequest;
use App\Http\Resources\API\V1\Property\PropertyCollection;
use App\Http\Resources\API\V1\Property\PropertyResource;
use App\Models\API\V1\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    public function index()
    {
        return new PropertyCollection(Property::all());
    }

    public function propertyuser()
    {
        return new PropertyCollection(Property::where('user_id', auth()->user()->id)->paginate(20));
    }

    public function store(StorePropertyRequest $request)
    {
        $Property = new Property($request->all());

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Cover', $file);
            $Property->cover = $file;
        }

        $Property->save();

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Property, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(Property $PropertyId)
    {
        return response()->json(new PropertyResource($PropertyId),200);
    }

    public function update(UpdatePropertyRequest $request, $PropertyId)
    {
        $Property=Property::findOrFail($PropertyId);
        if ($request->hasFile('cover')){
            if (File::exists("storage/Cover/".$Property->cover)) {
                File::delete("storage/Cover/".$Property->cover);
            }
            $image = $request->file('cover');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Cover', $file);
            $Property->cover = $file;

            $request['cover'] = $Property->cover;
        }

        $Property->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'property_type_id' =>$request->property_type_id,
            'room_type_id' =>$request->room_type_id,
            'category_id' =>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'country_id' =>$request->country_id,
            'state_id' =>$request->state_id,
            'city_id' =>$request->city_id,
            'address' =>$request->address,
            'latitude' =>$request->latitude,
            'longitude' =>$request->longitude,
            'accommodate_count' =>$request->accommodate_count,
            'bedroom_count' =>$request->bedroom_count,
            'bed_count' =>$request->bed_count,
            'bathroom_count' =>$request->bathroom_count,
            'currency_id' =>$request->currency_id,
            'price' =>$request->price,
            //$request->all(),
            'cover'=>$Property->cover
        ]);
        
        return (new PropertyResource($Property))
        ->additional(['msg' => 'Actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    public function destroy(Property $request, $PropertyId)
    {
        $Property = Property::findOrFail($PropertyId);
        
        if (File::exists("storage/Cover/".$Property->cover)) {
            File::delete("storage/Cover/".$Property->cover);
        }

        $Property->delete();
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Property, //retorna toda la data
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
