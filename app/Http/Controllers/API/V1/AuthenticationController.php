<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Authentication\LoginRequest;
use App\Http\Requests\API\V1\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'isGuest';
        $user->save();

        $token = $user->createToken($request->email)->plainTextToken;

        //$user->assignRole('invitado');

        return response()->json([
            'res' => true,
            'token' => $token,
            'usuario' => $user,
            'msg' => 'Registrado correctamente'
        ],200);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas.'],
            ]);
        }
     
        $token = $user->createToken($request->email)->plainTextToken;

        return response([
            'res' => true,
            'token' => $token,
            'usuario' => $user
        ],200);
    }

    public function cerrarSesion(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'res' => true,
            'msg' => 'Token eliminado correctamente'
        ],200);
    }
}
