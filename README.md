> **Warning**
>
> This repository is archived.
>
> Use [laravel/framework](https://github.com/laravel/framework) instead.

# Laravel UUID

[![Latest Stable Version](https://poser.pugx.org/healthengine/laravel-uuid/version)](https://packagist.org/packages/healthengine/laravel-uuid)
[![Total Downloads](https://poser.pugx.org/healthengine/laravel-uuid/downloads)](https://packagist.org/packages/healthengine/laravel-uuid)
[![Build Status](https://travis-ci.com/HealthEngineAU/laravel-uuid.svg?branch=master)](https://travis-ci.com/HealthEngineAU/laravel-uuid)

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
