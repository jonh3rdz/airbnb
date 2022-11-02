<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        //
    }

    public function show(Country $CountryId)
    {
        return response()->json(new CountryResource($CountryId),200);
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
