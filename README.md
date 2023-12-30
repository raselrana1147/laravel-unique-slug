"# laravel-unique-slug" 
 ## Instalation
 ```sh 
 composer require raselrana/laravel-unique-slug
```
 ## Use From Controller
 #### Import first slug
```php
$slug=UniqueSlug::generate(App\Models\User::class,'rasel','name');
 //Here pass 3 required parameter and one optional parameter
 ```
 ## Publish vender and configuration
 ```php
 php artisan vendor:publish rasel/laravel-unique-slug
 ```
 ## Package configuration file
 ### Go to config/laravel-unique-slug
 ```php
 return[

    'separator'=>'-',
    'max_count'=>100
];
```
## Contribution
You are open to pull request and can contribute

