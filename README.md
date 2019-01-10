# Laravel UUID

[![Build Status](https://travis-ci.com/HealthEngineAU/laravel-uuid.svg?branch=master)](https://travis-ci.com/HealthEngineAU/laravel-uuid)
[![Coverage Status](https://coveralls.io/repos/github/HealthEngineAU/laravel-uuid/badge.svg?branch=master)](https://coveralls.io/github/HealthEngineAU/laravel-uuid?branch=master)
[![Build Status](https://travis-ci.com/HealthEngineAU/laravel-uuid.svg?branch=master)](https://travis-ci.com/HealthEngineAU/laravel-uuid)
[![Coverage Status](https://coveralls.io/repos/github/HealthEngineAU/laravel-uuid/badge.svg?branch=master)](https://coveralls.io/github/HealthEngineAU/laravel-uuid?branch=master)

This is a custom package designed for Laravel Eloquent. It provides a trait that can be used in model classes that will
automatically generate a UUID primary key instead of the default auto-incrementing integer.

## Usage

All that is necessary to have this working is to `use` the trait in the model class. An example is shown below.  
Don't forget that the migration will need to be changed to create a UUID (or string) column instead of an integer
column. You'll also need to explicitly set the column as the primary key.

```php
use HealthEngine\LaravelUuid\UuidPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UuidPrimaryKey;

    //
}
```

## License

Laravel UUID is licensed under the MIT license.
