<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\MeetingRequestInterface;
use Illuminate\Http\Request;

class MeetingRequestController extends Controller
{
    protected $meetingRequest;

    public function __construct(MeetingRequestInterface $meetingRequest)
    {
        $this->meetingRequest = $meetingRequest;
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables()->of($this->meetingRequest->getAll())
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('company', function ($data) {
                    return $data->company;
                })
                ->addColumn('date', function ($data) {
                    return date('d F Y',strtotime($data->date));
                })
                ->addColumn('time', function ($data) {
                    return date('H:i',strtotime($data->time));
                })
                ->addColumn('action', function ($data) {
                    return view('admin.meeting-request.column.action', compact('data'));
                })
                ->addIndexColumn()
                ->make(true);
        }

       return view('admin.meeting-request.index');
    }

    public function destroy($id)
    {
        $this->meetingRequest->delete($id);
        return response()->json(true);
    }
}
