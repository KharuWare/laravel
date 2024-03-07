<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'logname' => 'required',
            'logpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['logname'], 'password' => $incomingFields['logpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/posts');
    }

    public function getUser($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('users', ['user' => $user]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:16', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect()->to('/posts');
    }

}
