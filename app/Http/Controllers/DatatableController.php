<?php

namespace App\Http\Controllers;

use App\Models\Datatable;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function index()
    {
        $datatable = Datatable::all();
        return view('admin.tables', compact('datatable'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'age' => 'required|numeric',
            'office' => 'required|max:255',
            'start_date' => 'required|date'
        ]);

        Datatable::create($validatedData);

        return redirect()->route('datatable.index')
            ->with('success', 'Data created successfully');
    }

    public function edit($id)
    {
        $datatable = Datatable::findOrFail($id);
        return view('admin.edit', compact('datatable'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'age' => 'required|numeric',
            'office' => 'required|max:255',
            'start_date' => 'required|date'
        ]);

        $datatable = Datatable::findOrFail($id);
        $datatable->update($validatedData);

        return redirect()->route('datatable.index')
            ->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $datatable = Datatable::findOrFail($id);
        $datatable->delete();

        return redirect()->route('datatable.index')
            ->with('success', 'Data deleted successfully');
    }
}