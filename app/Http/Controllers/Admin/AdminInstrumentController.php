<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Models\Instrument;
use App\Models\Level;
use App\Models\Qualification;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminInstrumentController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin.instrument.index', compact('levels'));
    }

    public function create()
    {
        $expertises = Expertise::all();
        $levels = Level::all();
        $qualifications = Qualification::all();
        $questions = Question::all();
        return view('admin.instrument.create', compact('expertises', 'qualifications', 'levels', 'questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'organisation' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'age' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            // 'question' => 'required|array', // Ensure 'question' is an array
        ]);

        // Encode the questions array as JSON
        $questionsJson = json_encode($request->question);

        // Calculate the average result from the questions
        $averageResult = $this->calculateAverage($request->question);

        // dd($request->all());

        Instrument::create([
            'date' => now(),
            'name' => $request->name,
            'place' => $request->place,
            'designation' => $request->designation,
            'organisation' => $request->organisation,
            'gender' => $request->gender,
            'age' => $request->age,
            'expertise' => $request->expertise,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'questions' => $questionsJson, // Store the questions as JSON
            'result' => $averageResult, // Store the average result
        ]);

        return redirect()->route('admin.history.index')->with('alert', 'Success!');
    }

    // Method to calculate the average of the questions' values
    protected function calculateAverage(array $questions)
    {
        $total = array_sum($questions);
        $count = count($questions);

        return $count > 0 ? $total / $count : 0; // Calculate the average
    }
}
