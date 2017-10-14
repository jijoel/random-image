<?php namespace Jijoel\RandomImage;

use Illuminate\Support\Facades\Facade;
use Jijoel\RandomImage\RandomImage;

/**
 * @see \Jijoel\RandomImage\RandomImage
 */
class RandomImageFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'random-image';
    }
}
