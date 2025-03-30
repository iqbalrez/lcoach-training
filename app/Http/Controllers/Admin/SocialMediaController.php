<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\SocialMediaInterface;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    protected $socialMedia;

    public function __construct(SocialMediaInterface $socialMedia)
    {
        $this->socialMedia = $socialMedia;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables()->of($this->socialMedia->getAll())
                ->addColumn('app', function ($data) {
                    return $data->app;
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('link', function ($data) {
                    return $data->link;
                })
                ->addColumn('icon', function ($data) {
                    return view('admin.social-media.column.icon', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.social-media.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

       return view('admin.social-media.index');
    }

    
    public function create()
    {
        return view('admin.social-media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'app'     => ['required'],
            'name'   => ['required'],
            'link'   => ['required'],
            'icon' => ['required', 'image', 'mimes:svg', 'max:2048'],
        ]);

        $this->socialMedia->store($request->all());
        return redirect()->route('admin.social-media.index')->with('success', 'socialMedia added successfully');
    }

    public function edit($id)
    {
        return view('admin.social-media.edit', [
            'socialMedia' => $this->socialMedia->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'app'     => ['required'],
            'name'   => ['required'],
            'link' => ['required'],
            'icon' => ['image', 'mimes:svg', 'max:2048'],
        ]);

        $this->socialMedia->update($id, $request->all());
        return redirect()->route('admin.social-media.index')->with('success', 'socialMedia updated successfully');
    }

    public function destroy($id)
    {
        $this->socialMedia->delete($id);
        return response()->json(true);
    }
}
