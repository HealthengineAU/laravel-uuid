<?php

namespace HealthEngine\LaravelUuid\Tests\Models;

use HealthEngine\LaravelUuid\UuidPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UuidPrimaryKey;
}
