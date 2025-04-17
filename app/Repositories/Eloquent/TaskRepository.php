<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Contracts\TaskRepositoryContract;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryContract
{

    public function all(): Collection
    {
        return Task::all();
    }

    public function getOne(int $id): ?Task
    {
        return Task::find($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(int $id, array $data): ?Task
    {
        $task = Task::find($id);
        if($task)
        {
            $task->update($data);
        }
        return $task;
    }

    public function delete(int $id): bool{
        $task = $this->find($id);
        if ($task) {
            return $task->delete();
        }
        return false;
    }
}
