<?php

namespace App\CommandBus;

interface ICommandBus
{
    public function send(ICommand|IQuery $request);
}
