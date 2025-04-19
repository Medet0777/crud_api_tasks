<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\TaskServiceContract;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected TaskServiceContract $service;

    public function __construct(TaskServiceContract $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->service->list();
    }

    public function show(int $id):JsonResponse
    {
        return $this->service->get($id);
    }

    public function store(TaskCreateRequest $request): JsonResponse
    {
        return $this->service->create($request->validated());
    }

    public function update(TaskUpdateRequest $request, int $id): JsonResponse
    {
        return $this->service->update($id, $request->validated());
    }

    public function destroy(int $id):JsonResponse
    {
        return $this->service->delete($id);
    }

    //example
}
