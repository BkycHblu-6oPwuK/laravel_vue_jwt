<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email',$data['email'])->first();

        if ($user){
            return response(['error_email' => 'Пользователь с таким email уже зарегистрирован'],403);
        } 

        $user = User::create($data);
        $token = auth()->tokenById($user->id);
        return response(['access_token' => $token]);
    }
}
