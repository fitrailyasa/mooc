<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Expertise;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class AdminUserController extends Controller
{
    public function index()
    {
        $roles = [
            [
                'id' => 'admin',
                'name' => 'Admin',
            ],
            [
                'id' => 'user',
                'name' => 'User',
            ]
        ];
        $users = User::all();
        $expertises = Expertise::all();
        return view('admin.user.index', compact('users', 'expertises', 'roles'));
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->validated());
        return back()->with('alert', 'Success Create User!');
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::where('id', $id)->first();
        $userData = $request->validated();

        if ($request->has('password') && !empty($request->password)) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);
        return back()->with('alert', 'Success Edit User!');
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return back()->with('alert', 'Success Delete User!');
    }
}
