<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Booking\StoreBookingRequest;
use App\Http\Resources\API\V1\Booking\BookingCollection;
use App\Http\Resources\API\V1\Booking\BookingResource;
use App\Models\API\V1\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return new BookingCollection(Booking::all());
    }

    public function bookinguser()
    {
        return new BookingCollection(Booking::all()->where('user_id', auth()->user()->id)); //sin paginar
        //return new PropertyCollection(Property::where('user_id', auth()->user()->id)->paginate(20)); //paginar
    }

    public function bookingusers()
    {
        return new BookingCollection(Booking::all()->where('user_id', auth()->user()->id)); //sin paginar
        //return new PropertyCollection(Property::where('user_id', auth()->user()->id)->paginate(20)); //paginar
    }

    public function store(StoreBookingRequest $request)
    {
        $Booking = Booking::create($request->all());
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Booking, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(Booking $BookingId)
    {
        return response()->json(new BookingResource($BookingId),200);
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
