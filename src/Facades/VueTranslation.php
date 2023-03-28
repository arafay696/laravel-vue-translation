<?php

namespace Devplus\Translation\Facades;

use Illuminate\Support\Facades\Facade;

class VueTranslation extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'VueTranslation';
    }
}
