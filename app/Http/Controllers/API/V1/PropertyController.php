<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Property\StorePropertyRequest;
use App\Http\Requests\API\V1\Property\UpdatePropertyRequest;
use App\Http\Resources\API\V1\Property\PropertyCollection;
use App\Http\Resources\API\V1\Property\PropertyResource;
use App\Models\API\V1\Property;
use App\Models\API\V1\PropertyImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        return new PropertyCollection(Property::all());
    }

    public function propertyuser()
    {
        return new PropertyCollection(Property::all()->where('user_id', auth()->user()->id)); //sin paginar
        //return new PropertyCollection(Property::where('user_id', auth()->user()->id)->paginate(20)); //paginar
    }

    public function search($field, $query)
    {
        return new PropertyCollection(Property::where($field, 'LIKE', "%$query%")->latest()->paginate(10));
    }

    public function store(StorePropertyRequest $request)
    {
        $Property = new Property($request->all());
        $this->authorize('create', $Property);

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Cover', $file);
            $Property->cover = $file;
        }

        $Property->save();

        if($request->hasFile("property_images")){
            $path=$request->file("property_images");
            foreach($path as $path){
                $imageName=time().'_'.$path->getClientOriginalName();
                $request['property_id']=$Property->id;
                $request['property_image']=$imageName;
                $path->move(\public_path("storage/Property_images"),$imageName);
                PropertyImage::create($request->all());

            }
        }

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Property, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(Property $PropertyId)
    {
        $imagenes = DB::select("SELECT property_images.id, property_images.property_image	
        FROM properties
        INNER JOIN property_images ON properties.id = property_images.property_id
        WHERE properties.id = $PropertyId->id");
        
        return response()->json([
            'data' => new PropertyResource($PropertyId),
            'res' => true, //Retorna una respuesta
            //'data' => new PropertyResource($PropertyId), //retorna toda la data
            'images' => $imagenes,
        ],200);
        //return response()->json(new PropertyResource($PropertyId),200);
    }

    public function images()
    {
        $imagenes = DB::select('SELECT property_images.property_image
			
        FROM properties
        INNER JOIN property_images ON properties.id = property_images.property_id
        
        WHERE properties.id = property_images.property_id');
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $imagenes, //retorna toda la data
        ],200);
    }

    public function updaterole(Request $request, User $PropertyId)
    {
        // $Property=Property::findOrFail($PropertyId);
        $Property = DB::update("UPDATE users
        SET role = 'isHost'
        WHERE users.id = $PropertyId->id");
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Property, //retorna toda la data
        ],200);
    }

    public function update(UpdatePropertyRequest $request, $PropertyId)
    {
        $Property=Property::findOrFail($PropertyId);
        $this->authorize('update', $Property);

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

        PropertyImage::where('property_id', $PropertyId)->delete();
        // $imagesd=PropertyImage::where("property_id",$Property->id)->get();
        //     foreach($imagesd as $imaged){
        //         if (File::exists("public/Property_images/".$imaged->property_image)) {
        //             File::delete("public/Property_images/".$imaged->property_image);
        //         }
        //     }

            if($request->hasFile("property_images")){
                $path=$request->file("property_images");
                foreach($path as $path){
                    $imageName=time().'_'.$path->getClientOriginalName();
                    $request['property_id']=$Property->id;
                    $request['property_image']=$imageName;
                    $path->move(\public_path("storage/Property_images"),$imageName);
                    PropertyImage::create($request->all());
    
                }
            }


        
        return (new PropertyResource($Property))
        ->additional(['msg' => 'Actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    public function destroy(Property $request, $PropertyId)
    {
        $Property = Property::findOrFail($PropertyId);
        $this->authorize('delete', $Property);

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
