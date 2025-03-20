<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\WebConfigInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $webConfig;

    public function __construct(WebConfigInterface $webConfig)
    {
        $this->webConfig = $webConfig;
    }

    public function index()
    {
       return view('admin.dashboard.index', [
            'webConfig' => $this->webConfig->getConfig(),
       ]);
}

    public function update(Request $request)
    {
        $this->webConfig->update($request->all());
        return redirect()->route('admin.dashboard.index')->with('success', 'Web config updated successfully');
    }
}
