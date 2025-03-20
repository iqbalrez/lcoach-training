<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\MeetingRequestInterface;
use App\Interfaces\WebConfigInterface;
use App\Mail\MeetingRequestNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $meetingRequest;
    private $webConfig;

    public function __construct(MeetingRequestInterface $meetingRequest, WebConfigInterface $webConfig)
    {
        $this->meetingRequest = $meetingRequest;
        $this->webConfig = $webConfig;
    }

    public function index()
    {
        return view('user.landing',
            [
                'webConfig' => $this->webConfig->getConfig(),
            ]);
    }

    public function storeMeetingRequest(Request $request)
    {
        try {
            $request->validate([
                'name'         => ['required'],
                'email'         => ['required'],
                'company' => ['nullable'],
                'date'      => ['required'],
                'time'      => ['required'],
            ]);
        
        // Kirim email notifikasi
        Mail::to("iqbalrr02@gmail.com")->send(new MeetingRequestNotification($request->name, $request->email, $request->company, $request->date, $request->time));

        $this->meetingRequest->store($request->all());
            return redirect()->route('user.landing.index')->with('success', 'Meeting request sent');
        } catch (\Throwable $th) {
            return redirect()->route('user.landing.index')->with('error', $th->getMessage());
        }
    }

    public function who()
    {
        return view('user.who',
            [
                'webConfig' => $this->webConfig->getConfig(),
            ]
    );
    }

    public function what()
    {
        return view('user.what',
        [
            'webConfig' => $this->webConfig->getConfig(),
        ]);
    }

    public function caseStudies()
    {
        return view('user.case-studies',
        [
            'webConfig' => $this->webConfig->getConfig(),
        ]);
    }

    public function contact()
    {
        return view("user.contact",
        [
            'webConfig' => $this->webConfig->getConfig(),
        ]);
    }
}
