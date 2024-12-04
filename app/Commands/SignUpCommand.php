<?php

namespace App\Commands;

use App\CommandBus\ICommand;
use App\CommandBus\ICommandHandler;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignUpCommand implements ICommand
{

}

class SignUpCommandHandler implements ICommandHandler
{
    public function handle(SignUpCommand $command)
    {
        $userDetails = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        $user = User::create($userDetails);

        Auth::login($user);
        return redirect(route('home'));
    }
}
