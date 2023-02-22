<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected User $repository,
    ) {}

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
