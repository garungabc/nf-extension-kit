<?php

namespace NightFury\ExtensionKit\Facades;

use Illuminate\Support\Facades\Facade;

class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \NightFury\ExtensionKit\Services\View;
    }
}
