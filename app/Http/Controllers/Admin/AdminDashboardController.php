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
        $categoriesCount = Category::all()->count();
        $questions = Question::all()->count();
        $levels = Level::all()->count();

        $categoriesWithAvg = Category::all()->map(function ($category) {
            $totalResults = 0;
            $countResults = 0;

            foreach ($category->questions as $question) {
                foreach ($question->instruments as $instrument) {
                    $totalResults += $instrument->result;
                    $countResults++;
                }
            }
            $category->avg_result = $countResults ? $totalResults / $countResults : 0;

            return $category;
        });


        // dd($categoriesWithAvg);

        return view('admin.dashboard', compact('users', 'categoriesWithAvg', 'categoriesCount', 'questions', 'levels'));
    }
}
