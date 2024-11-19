<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task\TaskService;
use Exception;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct(
        private readonly TaskService $taskService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->taskService->getAll());
    }

    /**
     * @throws Exception
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($this->taskService->store($validated), 201);
    }

    /**
     * Display the specified resource.
     * @throws Exception
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->taskService->getById($id));
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(UpdateTaskRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($this->taskService->update($id, $validated), 201);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(string $id): JsonResponse
    {
        $this->taskService->delete($id);
        return response()->json(['message' => 'OK']);
    }
}
