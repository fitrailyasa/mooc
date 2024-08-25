<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instrument;
use App\Models\Level;
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
        $levels = Level::all();
        $questions = Question::all();
        return view('admin.instrument.create', compact('levels', 'questions'));
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
        ]);

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
        ]);

        return redirect()->route('admin.history.index')->with('alert', 'Success!');
    }
}
