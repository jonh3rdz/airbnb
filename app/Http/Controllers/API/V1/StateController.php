<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\State\StoreStateRequest;
use App\Http\Requests\API\V1\State\UpdateStateRequest;
use App\Http\Resources\API\V1\State\StateCollection;
use App\Http\Resources\API\V1\State\StateResource;
use App\Models\API\V1\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        return new StateCollection(State::all());
    }

    public function store(StoreStateRequest $request)
    {
        $state = State::create($request->all());
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $state, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(State $StateId)
    {
        return response()->json(new StateResource($StateId),200);
    }

    public function update(UpdateStateRequest $request, State $StateId)
    {
        $StateId->update($request->all());
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $StateId, //retorna toda la data
            'msg' => 'Actualizado correctamente' //Retorna un mensaje
        ],200);
    }

    public function destroy(State $request, $StateId)
    {
        $State = State::findOrFail($StateId);

        $State->delete();

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $State, //retorna toda la data
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
