<?php
namespace Rasel\LaravelPackage;

class UniqueSlug
{

      /**
     * Generate a Unique Slug.
     *
     * @param object $model
     * @param string $value
     * @param string $field
     * @param string $separator
     *
     * @return string
     * @throws \Exception
     */

    public function generateByModel($model, $value, $field,$separator = null): string
    {


        $separator = empty($separator) ? config('laravel-unique-slug.separator') : $separator;
        $id=0;
        $slug=str_replace(' ',$separator,$value);
        $slug=preg_replace('/[^A-Za-z0-9\-]/','',$slug);

        $checker=$model::where("$field",'like', $value . '%')->first();
        if (empty($checker)) {
            $slug=$slug.$separator.$id;
        }else{
            $slug=$slug.$separator.$checker->id;
        }
        $slug=strtolower($slug);
        return $slug;
    }


}
