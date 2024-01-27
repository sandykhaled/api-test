<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Faker\Provider\Base;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|min:3|max:100',
            'email'=>'required|email',
            'password'=>'required',
            'shoulder' => 'nullable|numeric|min:0',
            'waist' => 'nullable|numeric|min:0',
            'hips' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'bust' => 'nullable|numeric|min:0',
            'chest' => 'nullable|numeric|min:0',
            'inseam' => 'nullable|numeric|min:0',
            'thigh' => 'nullable|numeric|min:0',
            'phone_number' => 'nullable|numeric',
            'gender' => 'in:Male,Female',
            'age' => 'nullable|integer|min:1',
            'fav_color' => 'string'
        ]);
        if($validator->fails()){
            return ApiTrait::errorMessage([], 'Validation Error', 404);
        }
        $input=$request->all();
        $input['password'] = bcrypt($input['password']);
        $user=User::create($input);
        return ApiTrait::successMessage('User Register Successfully', 201);


    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user=Auth::user();
            return ApiTrait::successMessage('User Login Successfully', 201);

        }
        else{
            return ApiTrait::errorMessage([], 'Unauthorised', 404);

        }

    }
}
