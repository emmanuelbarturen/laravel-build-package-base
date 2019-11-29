<h1>Laravel 6 Build package - Base</h1>

Base package for build your own laravel package



## Directory Structure
```
code 
└───dev-packages <-- Main Directory 
│   │
|   └─── <vendor-name> <-- Vendor Directory 
│   │   |
|   |   └─── <package-name> <-- Package Directory 
│   │   |   | README.md
│   │   |   | .gitignore
│   │   |   | composer.json
│   │   |   | composer.lock
│   │   |   | phpunit.xml
│   │   |   └─── src <-- Source Directory 
│   │   │   │    │ <name>Facade.php
│   │   │   │    │ <name>ServiceProvider.php
│   │   │   │    │ routes.php
│   │   │   │    └─── config    
│   │   │   │    │    │ <name>.php  
│   │   │   │    └─── migrations  
│   │   │   │    │    │ 2019_11_08_115833_migration_name.php
│   │   │   │    │    │ 2019_11_08_116234_migration_name.php
│   │   │   │    │
|   |   |   └─── test <-- Test Directory 
|   |   |   |    | TestCase.php
└───Laravel-Project-Host
    | composer.json <-- Composer Host
```

## Add dependencies in laravel host application
First at all, add repositories array to composer.json(if not exists)

```
  ...
 "require": {
        "php": "^7.2",
        "fideloper/proxy": "^4.0",
        "laracasts/flash": "^3.0",
        "laravel/framework": "^6.0",
        "laravel/telescope": "^2.1",
        "laravel/tinker": "^1.0",
        "spatie/laravel-permission": "^3.0"
    },
 "repositories": [  <-- Add local repository
        {
            "type": "path",
            "url": "/home/vagrant/code/<main-directory-name>/<vendor-directory-name>/<package-directory-name>"
        }
    ],
  ...
```

## Install package
in laravel host application
- **Method A**    
  in terminal
  ```bash
  $ composer require vendor-name/package-name
  ```
- **Method B**     
add manually package entry

```
  ...
 "require": {
        "php": "^7.2",
        "fideloper/proxy": "^4.0",
        "laracasts/flash": "^3.0",
        "laravel/framework": "^6.0",
        "laravel/telescope": "^2.1",
        "laravel/tinker": "^1.0",
        "spatie/laravel-permission": "^3.0",
        "<vendor-name/<package-name>": "<branch>@<minimum-stability-value>" <-- package entry
    }
  ...
```

**Examples for package entry**
- `"vendor-name/package-name": "master@dev"`
- `"vendor-name/package-name": "dev-master"` //sometimes this works if you develop on windows

**update Composer**
 ```bash
  $ composer update
  ```    
  laravel would be discover the package
  
## Resources for laravel
All this sections has implement in this example package. You can remove it if is not necessary.
> Take special attention about namespaces.

### Migrations
Add migrations creating a directory called `migrations` in `src` 
> Tip: create migrations in host application via artisan and copy (or cut) and paste in migration directory

- **Register your migrations**    
in your `PackageNameServiceProvider` add this entry

```
 public function boot()
    {
        ...
        
       $this->loadMigrationsFrom(__DIR__ . '/migrations');
        
        ...
    }
```
[see official docs for more info](https://laravel.com/docs/6.x/packages#migrations)


### Config
Sometimes your package need your own config file. This can be publish in the laravel host application for customize configurations.
This file was created in `/src/config/<configuration-file>.php`, by convention this file has the same name as the package.

- **add to provider**    
in your `PackageNameServiceProvider` add this entry

```
 public function boot()
    {
        ...
        
        $this->publishes([__DIR__ . '/config/packagename.php' => config_path('freshsales.php')]);
        
        ...
    }
```
- **publish in laravel host application**
```bash
  $ php artisan vendor:publish --provider='VendorName\PackageName\PackageNameServiceProvider'
  ```    
  
where `VendorName\PackageName\` is the namespace followed by the ServiceProvider class name

[see official docs for more info](https://laravel.com/docs/6.x/packages#configuration)


### Middlewares
If your package has its own middlewares, create a directory called `Middlewares` and put here your middlewares
- **add to provider**    
in your `PackageNameServiceProvider` add this a entry for each middleware

```
 public function boot()
    {
        ...
        
       app('router')->aliasMiddleware('name.middleware', FirstMiddleware::class);
        
        ...
    }
```

 
### Views
If you want include views in your package, create a directory called `views` in `src` and put here your blade files

- **Register your views**    
in your `PackageNameServiceProvider` add this entry

```
 public function boot()
    {
        ...
        
       $this->loadViewsFrom(__DIR__ . '/views', 'package-name');
        
        ...
    }
```
[see official docs for more info](https://laravel.com/docs/6.x/packages#views)

### Routes
Sometimes you may want specific routes for your package. Create your own routes file (as you make in a laravel) and put it in `src` directory. 

- **add to provider**    
in your `PackageNameServiceProvider` add this entry

```
 public function boot()
    {
        ...
        
       $this->loadRoutesFrom(__DIR__ . '/routes.php');
        
        ...
    }
```
[see official docs for more info](https://laravel.com/docs/6.x/packages#routesg)


## Tests
    

## License

Laravel Build Package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
