<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ValuesInterface;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    protected $values;

    public function __construct(ValuesInterface $values)
    {
        $this->values = $values;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables()->of($this->values->getAll())
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('description', function ($data) {
                    return $data->description;
                })
                ->addColumn('image', function ($data) {
                    return view('admin.values.column.image', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.values.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

       return view('admin.values.index');
    }

    
    public function create()
    {
        return view('admin.values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => ['required'],
            'description'   => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $this->values->store($request->all());
        return redirect()->route('admin.values.index')->with('success', 'values added successfully');
    }

    public function edit($id)
    {
        return view('admin.values.edit', [
            'values' => $this->values->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => ['required'],
            'description'   => ['required'],
            'image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $this->values->update($id, $request->all());
        return redirect()->route('admin.values.index')->with('success', 'values updated successfully');
    }

    public function destroy($id)
    {
        $this->values->delete($id);
        return response()->json(true);
    }
}
