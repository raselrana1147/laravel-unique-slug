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
    public function testTime()
    {
        return "rasel";
    }
    public function generate($model, $value, $field, $separator = null): string
    {

        $separator = empty($separator) ? config('laravel-unique-slug.separator') : $separator;
        $id = 0;

        $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($value))));
        $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));


        $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);


        $allSlugs = $this->getRelatedSlugs($slug, $id, $model, $field);


        if (!$allSlugs->contains("$field", $slug)) {
            return $slug;
        }


        for ($i = 1; $i <= config('laravel-unique-slug.max_count'); $i++) {
            $newSlug = $slug . $separator . $i;
            if (!$allSlugs->contains("$field", $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');

    }

    private function getRelatedSlugs($slug, $id, $model, $field)
    {
        if (empty($id)) {
            $id = 0;
        }

        return $model::select("$field")
            ->where("$field", 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

}
