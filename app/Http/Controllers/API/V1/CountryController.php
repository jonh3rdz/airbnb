<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Country\StoreCountryRequest;
use App\Http\Requests\API\V1\Country\UpdateCountryRequest;
use App\Http\Resources\API\V1\Country\CountryCollection;
use App\Http\Resources\API\V1\Country\CountryResource;
use App\Models\API\V1\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return new CountryCollection(Country::all());
    }

    public function store(StoreCountryRequest $request)
    {
        $country = Country::create($request->all());
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $country, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(Country $CountryId)
    {
        return response()->json(new CountryResource($CountryId),200);
    }

    public function update(UpdateCountryRequest $request, Country $CountryId)
    {
        $CountryId->update($request->all());
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $CountryId, //retorna toda la data
            'msg' => 'Actualizado correctamente' //Retorna un mensaje
        ],201);
    }

    public function destroy(Country $request, $CountryId)
    {
        $country = Country::findOrFail($CountryId);

        $country->delete();

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $country, //retorna toda la data
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
