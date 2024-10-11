<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QualificationImport;
use App\Exports\QualificationExport;
use App\Http\Requests\QualificationRequest;

class AdminQualificationController extends Controller
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
            $qualifications = Qualification::where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $qualifications = Qualification::paginate($validPerPage);
        }

        return view("admin.qualification.index", compact('qualifications', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new QualificationImport, $file);

        return back()->with('alert', 'Success Import Data Qualification!');
    }

    public function export()
    {
        return Excel::download(new QualificationExport, 'Data Qualification.xlsx');
    }

    public function store(QualificationRequest $request)
    {
        $Qualification = Qualification::create($request->validated());

        return back()->with('alert', 'Success Create Data Qualification!');
    }

    public function update(QualificationRequest $request, $id)
    {
        $Qualification = Qualification::findOrFail($id);
        $Qualification->update($request->validated());

        return back()->with('alert', 'Success Edit Data Qualification!');
    }

    public function destroy($id)
    {
        Qualification::findOrFail($id)->delete();
        return back()->with('alert', 'Success Delete Data Qualification!');
    }

    public function destroyAll()
    {
        Qualification::truncate();
        return back()->with('alert', 'Success Delete All Qualification!');
    }
}
