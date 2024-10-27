<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHistoryController extends Controller
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

        if ($search) {
            // $instruments = Instrument::where('name', 'like', "%{$search}%")
            //     ->orWhere('desc', 'like', "%{$search}%")
            //     ->paginate($validPerPage);
        } else {
            // $instruments = Instrument::paginate($validPerPage);
        }

        if (Auth::user()->role != 'admin') {
            $users = User::with('instruments')->where('id', Auth::user()->id)->whereHas('instruments')->get();
        } else {
            $users = User::with('instruments')->whereHas('instruments')->get();
        }

        // $instruments = Instrument::all();

        return view("admin.history.index", compact('users', 'search', 'perPage'));
    }

    public function destroyAll()
    {
        Instrument::truncate();
        return back()->with('alert', 'Success Delete All History!');
    }
}
