<?php

namespace App\Contracts;
use Illuminate\Http\JsonResponse;
interface TaskServiceContract{

    public function list(): JsonResponse;

    public function get(int $id): JsonResponse;

    public function create(array $data): JsonResponse;

    public function update(int $id, array $data): JsonResponse;

    public function delete(int $id): JsonResponse;

}
