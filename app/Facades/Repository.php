<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Contracts\TaskRepositoryContract;

/**
 * @method static TaskRepositoryContract task()
 */
class Repository extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'repository';
    }
}
