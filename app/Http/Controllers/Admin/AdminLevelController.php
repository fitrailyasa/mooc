<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LevelImport;
use App\Exports\LevelExport;
use App\Http\Requests\LevelRequest;

class AdminLevelController extends Controller
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
            $levels = Level::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $levels = Level::paginate($validPerPage);
        }

        $counter = ($levels->currentPage() - 1) * $levels->perPage() + 1;

        return view("admin.level.index", compact('levels', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new LevelImport, $file);
        return back()->with('alert', 'Success Import Data Level!');
    }

    public function export()
    {
        return Excel::download(new LevelExport, 'Data Level.xlsx');
    }

    public function store(LevelRequest $request)
    {
        $level = Level::create($request->validated());
        return back()->with('alert', 'Success Create Data Level!');
    }

    public function update(LevelRequest $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->update($request->validated());
        return back()->with('alert', 'Success Edit Data Level!');
    }

    public function destroy($id)
    {
        Level::findOrFail($id)->delete();
        return back()->with('alert', 'Success Delete Data Level!');
    }

    public function destroyAll()
    {
        Level::truncate();
        return back()->with('alert', 'Success Delete All Level!');
    }
}
