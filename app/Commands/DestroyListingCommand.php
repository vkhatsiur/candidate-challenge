<?php

namespace App\Commands;

use App\CommandBus\ICommand;
use App\CommandBus\ICommandHandler;
use App\Enums\ListingStatus;
use App\Models\Listing;

class DestroyListingCommand implements ICommand
{
    public Listing $listing;

    function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }
}

class DestroyListingCommandHandler implements ICommandHandler
{
    public function handle(DestroyListingCommand $command)
    {
        $command->listing->status = ListingStatus::Inactive->value;
        $command->listing->published_at = null;
        $command->listing->save();
        $command->listing->delete();

        return redirect(route('home'));
    }
}
