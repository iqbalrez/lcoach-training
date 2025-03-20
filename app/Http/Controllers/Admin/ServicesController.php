<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ServicesInterface;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    protected $services;

    public function __construct(ServicesInterface $services)
    {
        $this->services = $services;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables()->of($this->services->getAll())
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('description', function ($data) {
                    return $data->description;
                })
                ->addColumn('image', function ($data) {
                    return view('admin.services.column.image', compact('data'));
                })
                ->addColumn('content', function ($data) {
                    return view('admin.services.column.content', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.services.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

       return view('admin.services.index');
    }

    
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => ['required'],
            'description'   => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required'],
        ]);

        $this->services->store($request->all());
        return redirect()->route('admin.services.index')->with('success', 'services added successfully');
    }

    public function edit($id)
    {
        return view('admin.services.edit', [
            'services' => $this->services->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => ['required'],
            'description'   => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required'],
        ]);

        $this->services->update($id, $request->all());
        return redirect()->route('admin.services.index')->with('success', 'services updated successfully');
    }

    public function destroy($id)
    {
        $this->services->delete($id);
        return response()->json(true);
    }
}
