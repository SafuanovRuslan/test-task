<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User\UserService;
use Exception;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->userService->getAll());
    }

    /**
     * @throws Exception
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($this->userService->store($validated), 201);
    }

    /**
     * Display the specified resource.
     * @throws Exception
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->userService->getById($id));
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($this->userService->update($id, $validated), 201);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(string $id): JsonResponse
    {
        $this->userService->delete($id);
        return response()->json(['message' => 'OK']);
    }
}
