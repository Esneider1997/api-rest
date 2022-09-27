<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Validator; // remplazada por "use Illuminate\Support\Facades\Validator;"
use App\Models\User;
use \stdClass;

/* ## Clases llamadas por mi ##  */
//use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:8'
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return  response()
                    ->json( [ 'data'=>$user,'access_token' => $token, 'token_type' => 'Bearer' ] );

    }

    public function login(Required $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            
        }
    }




}
