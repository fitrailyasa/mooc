<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use App\Exports\CategoryExport;
use App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
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
            $categories = Category::where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $categories = Category::paginate($validPerPage);
        }

        return view("admin.category.index", compact('categories', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new CategoryImport, $file);

        return back()->with('alert', 'Success Import Data Category!');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'Data Category.xlsx');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return back()->with('alert', 'Success Create Data Category!');
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return back()->with('alert', 'Success Edit Data Category!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('alert', 'Success Delete Data Category!');
    }

    public function destroyAll()
    {
        Category::truncate();
        return back()->with('alert', 'Success Delete All Category!');
    }
}
