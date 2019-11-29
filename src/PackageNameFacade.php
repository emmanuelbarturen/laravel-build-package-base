<?php namespace VendorName\PackageName;


use Illuminate\Support\Facades\Facade;


class PackageNameFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'package-name';
    }
}
