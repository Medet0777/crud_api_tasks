<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use App\Models\Task;
interface TaskRepositoryContract
{
    public function all():Collection;
    public function getOne(int $id): ?Task;

    public function create(array $data): Task;
    public function update(int $id, array $data): ?Task;

    public function delete(int $id):bool;


}
