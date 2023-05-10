<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function createUser(Request $request) {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function getUser(Request $request) {
        return $request->user();
    }

    public function createToken(Request $request) {
        $user = User::where('email', $request->email)->first();

        // если пользователь не найден
        if ($user == null) {
            throw ValidationException::withMessages([
                'email' => ['Неправильный адрес почты'],
            ]);
        }

        // Проверка пароля!
        if (Hash::check($request->password, $user->password)) {
            $abilities = ['user'];

            if ($user->isAdmin) {
                $abilities = ['user', 'admin'];
            }

            $token = $user->createToken($request->device_name, $abilities)->plainTextToken;
            $user->remember_token = $token;
            $user->save();

            return $token;
        } else {
            throw ValidationException::withMessages([
                'password' => ['Неправильный пароль'],
            ]);
        }
    }

    public function removeToken(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return 'token removed';
    }
}
