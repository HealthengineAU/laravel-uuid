<?php

namespace HealthEngine\LaravelUuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Trait UuidPrimaryKey
 * @package HealthEngine\LaravelUuid
 *
 * Allows an Eloquent model to use a UUID primary key instead of an auto-incrementing integer.
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait UuidPrimaryKey
{
    /**
     * If this trait is attached to an eloquent model, laravel will automatically call this method on instantiation of
     * the model.
     * It registers a function that will generate a new UUID primary key right before inserting it in the database.
     */
    protected static function bootUuidPrimaryKey()
    {
        static::creating(function (Model $model) {
            // hook into the creating event to generate a uuid in the primary key
            if (!isset($model->attributes[$model->getKeyName()])) {
                $model->{$model->getKeyName()} = (string)Str::uuid();
            }
        });
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
}
