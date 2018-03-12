<?php

namespace Bantenprov\RasioGrupKesenian\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The RasioGrupKesenian facade.
 *
 * @package Bantenprov\RasioGrupKesenian
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGrupKesenianFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rasio-grup-kesenian';
    }
}
