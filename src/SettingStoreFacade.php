<?php

namespace Leewillis77\SettingStore;

use Illuminate\Support\Facades\Facade;

class SettingStoreFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'setting_store';
    }
}
