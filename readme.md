<h1>Laravel Build package - Base</h1>

Base package for build your own laravel package

## Directory Structure
```
code 
└───dev-packages
│   │
|   └─── <vendor-name>
│   │   |
|   |   └─── <package-name>
│   │   |   | README.md
│   │   |   | .gitignore
│   │   |   | composer.json <-- Composer content example
│   │   |   | composer.lock
│   │   |   | phpunit.xml
│   │   |   └─── src
│   │   │   │    │ <name>Facade.php
│   │   │   │    │ <name>ServiceProvider.php
│   │   │   │    │ routes.php
│   │   │   │    └─── config    
│   │   │   │    │    │ <name>.php  
│   │   │   │    └─── migrations  
│   │   │   │    │    │ 2019_11_08_115833_migration_name.php
│   │   │   │    │    │ 2019_11_08_116234_migration_name.php
│   │   │   │    │
|   |   |   └─── test
|   |   |   |    | TestCase.php
└───Laravel-Project-Host
    | ...
```




## License

CulqiCashier is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
