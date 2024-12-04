<?php

namespace App\Enums;

enum ListingStatus : int
{
    case Draft = 1;
    case Active = 2;
    case Inactive = 3;
}
