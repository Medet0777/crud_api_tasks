<?php

namespace App\Facades;

use App\Contracts\TaskRepositoryContract;

class Repository {
    public function task() : TaskRepositoryContract
    {
        return app(TaskRepositoryContract::class);
    }
}
