<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Models\Instrument;
use App\Models\Level;
use App\Models\Qualification;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        foreach ($request->question as $key => $value) {
            Instrument::create([
                'user_id' => Auth::user()->id,
                'question_id' => $key,
                'result' => $value,
            ]);
        }

        $user = Auth::user()->id;

        User::find($user)->update([
            'name' => $request->name,
            'place' => $request->place,
            'designation' => $request->designation,
            'organisation' => $request->organisation,
            'gender' => $request->gender,
            'age' => $request->age,
            'expertise' => $request->expertise,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
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
