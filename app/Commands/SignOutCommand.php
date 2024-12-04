<?php

namespace App\Commands;

use App\CommandBus\ICommand;
use App\CommandBus\ICommandHandler;
use Illuminate\Support\Facades\Auth;

class SignOutCommand implements ICommand
{

}

class SignOutCommandHandler implements ICommandHandler
{
    public function handle(SignOutCommand $command)
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
