<?php

namespace HealthEngine\LaravelUuid\Tests;

use HealthEngine\LaravelUuid\Tests\Models\Post;
use HealthEngine\LaravelUuid\UuidPrimaryKey;
use Illuminate\Support\Str;
use Orchestra\Database\ConsoleServiceProvider;
use Orchestra\Testbench\TestCase;

class UuidPrimaryKeyTest extends TestCase
{
    public function testCreatingEventAddsUUIDWhenNotPresent()
    {
        $model = new Post();
        $model->save();

        $this->assertNotEmpty($model->id);
    }

    public function testCreatingEventAddsUUIDWhenPresent()
    {
        $uuid = Str::uuid();
        $model = new Post();
        $model->id = $uuid;
        $model->save();

        $this->assertEquals($uuid, $model->id);
    }

    public function testIncrementing()
    {
        $model = new Post();

        $this->assertFalse($model->getIncrementing());
    }

    public function testKeyType()
    {
        $model = new Post();

        $this->assertEquals('string', $model->getKeyType());
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(realpath(__DIR__ . '/migrations'));

        $this->artisan('migrate');

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /* protected function getPackageProviders($app)
    {
        return [ConsoleServiceProvider::class];
    } */
}
