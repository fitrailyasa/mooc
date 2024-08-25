<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instrument;
use Illuminate\Http\Request;

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
            $instruments = Instrument::where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $instruments = Instrument::paginate($validPerPage);
        }

        $counter = ($instruments->currentPage() - 1) * $instruments->perPage() + 1;

        return view("admin.history.index", compact('instruments', 'counter', 'search', 'perPage'));
    }
}
