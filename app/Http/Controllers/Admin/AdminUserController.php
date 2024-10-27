<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Expertise;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

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
        
        $expertises = Expertise::all();

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $users = User::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $users = User::paginate($validPerPage);
        }

        return view("admin.user.index", compact('users', 'roles', 'expertises', 'search', 'perPage'));
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
