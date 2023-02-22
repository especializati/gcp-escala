<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(
        protected User $repository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->repository->paginate();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUser $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $user = $this->repository->create($data);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->repository->findOrFail($id);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateUser $request, string $id)
    {
        $data = $request->validated();
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user = $this->repository->findOrFail($id);
        $user->update($data);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->findOrFail($id)->delete($id);

        return response()->noContent();
    }
}
