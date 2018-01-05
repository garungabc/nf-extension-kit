<?php

namespace NightFury\ExtensionKit\Facades;

use Illuminate\Support\Facades\Facade;
use NightFury\ExtensionKit\Manager;

class ExtensionKitManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new Manager;
    }
}
