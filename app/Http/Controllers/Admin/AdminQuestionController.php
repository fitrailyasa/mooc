<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionImport;
use App\Exports\QuestionExport;
use App\Http\Requests\QuestionRequest;
use App\Models\Category;

class AdminQuestionController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $categories = Category::all();

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $questions = Question::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $questions = Question::paginate($validPerPage);
        }

        return view("admin.question.index", compact('questions', 'categories', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new QuestionImport, $file);
        return back()->with('alert', 'Success Import Data Question!');
    }

    public function export()
    {
        return Excel::download(new QuestionExport, 'Data Question.xlsx');
    }

    public function store(QuestionRequest $request)
    {
        $question = Question::create($request->validated());
        return back()->with('alert', 'Success Create Data Question!');
    }

    public function update(QuestionRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->validated());
        return back()->with('alert', 'Success Edit Data Question!');
    }

    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return back()->with('alert', 'Success Delete Data Question!');
    }

    public function destroyAll()
    {
        Question::truncate();
        return back()->with('alert', 'Success Delete All Question!');
    }
}
