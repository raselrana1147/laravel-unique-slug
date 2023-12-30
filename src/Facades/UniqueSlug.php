<?php
namespace Rasel\LaravelPackage\Facades;

use Illuminate\Support\Facades\Facade;


/**
*@see \Rasel\LaravelPackage\UniqueSlug
*/

class UniqueSlug extends Facade
{


    protected static function getFacadeAccessor(): string
    {
        return "laravel-unique-slug";
    }
}
