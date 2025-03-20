<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CaseStudiesInterface;
use Illuminate\Http\Request;

class CaseStudiesController extends Controller
{
    private $caseStudies;

    public function __construct(CaseStudiesInterface $caseStudies)
    {
        $this->caseStudies = $caseStudies;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables()->of($this->caseStudies->getAll())
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('content', function ($data) {
                    return view('admin.case-studies.column.content', compact('data'));
                })
                ->addColumn('image', function ($data) {
                    return view('admin.case-studies.column.image', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.case-studies.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.case-studies.index');
    }

    public function create()
    {
        return view('admin.case-studies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => ['required'],
            'content'   => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $this->caseStudies->store($request->all());
        return redirect()->route('admin.case-studies.index')->with('success', 'caseStudies added successfully');
    }

    public function edit($id)
    {
        return view('admin.case-studies.edit', [
            'caseStudies' => $this->caseStudies->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => ['required'],
            'content'   => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $this->caseStudies->update($id, $request->all());
        return redirect()->route('admin.case-studies.index')->with('success', 'caseStudies updated successfully');
    }

    public function destroy($id)
    {
        $this->caseStudies->delete($id);
        return response()->json(true);
    }
}