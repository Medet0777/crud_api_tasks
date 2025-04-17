<?php

namespace App\Services;

use App\Contracts\TaskServiceContract;
use Illuminate\Http\JsonResponse;
use App\Facades\Repository;
use App\Http\Resources\TaskResource;

class TaskService implements TaskServiceContract{

    public function list(): JsonResponse
    {
        $tasks = Repository::task()->all();
        return response ()->json(TaskResource::collection($tasks));
    }

    public function get(int $id): JsonResponse
    {
        $task = Repository::task()->getOne($id);
        return $task
            ? response()->json(new TaskResource($task) )
            : response()->json(['message' => 'Task not found'], 404);
    }

    public function create(array $data): JsonResponse
    {
        $task = Repository::task()->create($data);
        return response()->json(new TaskResource($task), 201);
    }

    public function update(int $id, array $data): JsonResponse
    {
        $task = Repository::task()->update($id, $data);
        return $task
            ? response()->json(new TaskResource($task))
            : response()->json(['message' => 'Task not found'], 404);
    }

    public function delete(int $id): JsonResponse
    {
        $answer =  Repository::task()->delete($id);
        return $answer
            ? response()->json(['message' => 'Task deleted successfully'])
            : response()->json(['message' => 'Task not found'], 404);
    }
}

