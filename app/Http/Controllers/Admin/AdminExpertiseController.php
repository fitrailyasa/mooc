<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExpertiseImport;
use App\Exports\ExpertiseExport;
use App\Http\Requests\ExpertiseRequest;

class AdminExpertiseController extends Controller
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
            $expertises = Expertise::where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $expertises = Expertise::paginate($validPerPage);
        }

        return view("admin.expertise.index", compact('expertises', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new ExpertiseImport, $file);

        return back()->with('alert', 'Success Import Data Expertise!');
    }

    public function export()
    {
        return Excel::download(new ExpertiseExport, 'Data Expertise.xlsx');
    }

    public function store(ExpertiseRequest $request)
    {
        $Expertise = Expertise::create($request->validated());

        return back()->with('alert', 'Success Create Data Expertise!');
    }

    public function update(ExpertiseRequest $request, $id)
    {
        $Expertise = Expertise::findOrFail($id);
        $Expertise->update($request->validated());

        return back()->with('alert', 'Success Edit Data Expertise!');
    }

    public function destroy($id)
    {
        Expertise::findOrFail($id)->delete();
        return back()->with('alert', 'Success Delete Data Expertise!');
    }

    public function destroyAll()
    {
        Expertise::truncate();
        return back()->with('alert', 'Success Delete All Expertise!');
    }
}
