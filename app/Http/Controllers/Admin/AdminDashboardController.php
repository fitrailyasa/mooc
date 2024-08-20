<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\Level;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $categories = Category::all()->count();
        $questions = Question::all()->count();
        $levels = Level::all()->count();

        return view('admin.dashboard', compact('users', 'categories', 'questions', 'levels'));
    }
}
