<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new User();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('user');

        return [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'max:255',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'no_hp' => 'max:255',
            'password' => 'required|min:8',
            'role' => 'required',
            'status' => 'required',
            'place' => 'nullable|max:500',
            'designation' => 'nullable|max:500',
            'organisation' => 'nullable|max:500',
            'gender' => 'nullable|in:Male,Female',
            'age' => 'nullable|max:100',
            'expertise' => 'nullable|max:100',
            'qualification' => 'nullable|max:100',
            'experience' => 'nullable|max:100',
        ];
    }
}
