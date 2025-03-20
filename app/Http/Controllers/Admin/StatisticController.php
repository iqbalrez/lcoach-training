<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\StatisticInterface;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    protected $statistic;

    public function __construct(StatisticInterface $statistic)
    {
        $this->statistic = $statistic;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables()->of($this->statistic->getAll())
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('value', function ($data) {
                    return $data->value;
                })
                ->addColumn('icon', function ($data) {
                    return view('admin.statistic.column.icon', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.statistic.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

       return view('admin.statistic.index');
    }

    
    public function create()
    {
        return view('admin.statistic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => ['required'],
            'value'   => ['required'],
            'icon' => ['required', 'image', 'mimes:svg', 'max:2048'],
        ]);

        $this->statistic->store($request->all());
        return redirect()->route('admin.statistic.index')->with('success', 'statistic added successfully');
    }

    public function edit($id)
    {
        return view('admin.statistic.edit', [
            'statistic' => $this->statistic->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => ['required'],
            'value'   => ['required'],
            'icon' => ['image', 'mimes:svg', 'max:2048'],
        ]);

        $this->statistic->update($id, $request->all());
        return redirect()->route('admin.statistic.index')->with('success', 'statistic updated successfully');
    }

    public function destroy($id)
    {
        $this->statistic->delete($id);
        return response()->json(true);
    }
}
