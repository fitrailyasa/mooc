<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminQuestionResultController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        if ($search) {
            $questions = Question::with('instruments')
                ->select('questions.*')
                ->leftJoin('instruments', 'questions.id', '=', 'instruments.question_id')
                ->selectRaw('AVG(instruments.result) as avg_result')
                ->groupBy('questions.id')
                ->orderBy('avg_result', 'asc')
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $questions = Question::with('instruments')
                ->select('questions.*')
                ->leftJoin('instruments', 'questions.id', '=', 'instruments.question_id')
                ->selectRaw('AVG(instruments.result) as avg_result')
                ->groupBy('questions.id')
                ->orderBy('avg_result', 'asc')
                ->paginate($validPerPage);
        }
        return view('admin.question-results.index', compact('questions', 'search', 'perPage'));
    }
}
