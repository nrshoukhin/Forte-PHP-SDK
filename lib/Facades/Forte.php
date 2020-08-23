<?php
namespace Shoukhin\Forte\Facades;
use Illuminate\Support\Facades\Facade;

class Forte extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'forte';
    }
}