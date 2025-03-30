<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\WebConfigInterface;
use App\Interfaces\PartnerInterface;
use App\Interfaces\ServicesInterface;
use App\Interfaces\ValuesInterface;
use App\Interfaces\CaseStudiesInterface;
use App\Interfaces\StatisticInterface;
use App\Interfaces\MeetingRequestInterface;
use App\Interfaces\SocialMediaInterface;
use App\Mail\MeetingRequestNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $webConfig;
    private $partner;
    private $services;
    private $values;
    private $caseStudies;
    private $statistic;
    private $socialMedia;
    private $meetingRequest;


    public function __construct(WebConfigInterface $webConfig, PartnerInterface $partner, ServicesInterface $services, ValuesInterface $values, CaseStudiesInterface $caseStudies, StatisticInterface $statistic,  SocialMediaInterface $socialMedia, MeetingRequestInterface $meetingRequest)
    {
        $this->webConfig = $webConfig;
        $this->partner = $partner;
        $this->services = $services;
        $this->values = $values;
        $this->caseStudies = $caseStudies;
        $this->statistic = $statistic;
        $this->socialMedia = $socialMedia;
        $this->meetingRequest = $meetingRequest;
    }

    public function index()
    {
        return view('user.landing',
            [
                'webConfig' => $this->webConfig->getConfig(),
                'partners' => $this->partner->getAll(),
                'services' => $this->services->getAll(),
                'caseStudies' => $this->caseStudies->getAll(),
                'statistics' => $this->statistic->getAll(),
                'socialMedia' => $this->socialMedia->getAll(),
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
                'values' => $this->values->getAll(),
            ]
    );
    }

    public function what()
    {
        return view('user.services.index',
        [
            'webConfig' => $this->webConfig->getConfig(),
            'services' => $this->services->getAll(),
        ]);
    }

    public function whatDetail($id)
    {
        return view('user.services.detail',
        [
            'webConfig' => $this->webConfig->getConfig(),
            'service' => $this->services->getById($id),
        ]);
    }

    public function caseStudies()
    {
        return view('user.case-studies.index',
        [
            'webConfig' => $this->webConfig->getConfig(),
            'caseStudies' => $this->caseStudies->getAll(),
        ]);
    }

    public function caseStudiesDetail($id)
    {
        return view('user.case-studies.detail',
        [
            'webConfig' => $this->webConfig->getConfig(),
            'caseStudy' => $this->caseStudies->getById($id),
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
