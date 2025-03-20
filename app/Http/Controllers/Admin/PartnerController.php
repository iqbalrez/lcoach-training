<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PartnerInterface;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $partner;

    public function __construct(PartnerInterface $partner)
    {
        $this->partner = $partner;
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables()->of($this->partner->getAll())
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('link', function ($data) {
                    return $data->link;
                })
                ->addColumn('logo', function ($data) {
                    return view('admin.partner.column.logo', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.partner.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

       return view('admin.partner.index');
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required'],
            'link'   => ['nullable'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $this->partner->store($request->all());
        return redirect()->route('admin.partner.index')->with('success', 'partner added successfully');
    }

    public function edit($id)
    {
        return view('admin.partner.edit', [
            'partner' => $this->partner->getById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => ['required'],
            'link'   => ['nullable'],
            'logo' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $this->partner->update($id, $request->all());
        return redirect()->route('admin.partner.index')->with('success', 'partner updated successfully');
    }

    public function destroy($id)
    {
        $this->partner->delete($id);
        return response()->json(true);
    }
}
