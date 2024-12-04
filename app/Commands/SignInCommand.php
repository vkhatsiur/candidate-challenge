<?php

namespace App\Commands;

use App\CommandBus\ICommand;
use App\CommandBus\ICommandHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SignInCommand implements ICommand
{

}

class SignInCommandHandler implements ICommandHandler
{
    public function handle(SignInCommand $command)
    {
        $userCredentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($userCredentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        request()->session()->regenerate();
        return redirect(route('home'));
    }
}
