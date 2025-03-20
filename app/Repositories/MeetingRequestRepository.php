<?php

namespace App\Repositories;
use App\Models\MeetingRequest;
use App\Interfaces\MeetingRequestInterface;
use Illuminate\Support\Facades\Storage;

class MeetingRequestRepository implements MeetingRequestInterface
{
    private $meetingRequest;

    public function __construct(MeetingRequest $meetingRequest)
    {
        $this->meetingRequest = $meetingRequest;
    }

    public function getAll()
    {
        return $this->meetingRequest->orderBy('date', 'asc')->get();
    }

    public function getUpcoming()
    {
        $today = now();

        // 10 MeetingRequest yang akan datang
        $upcomingMeetingRequests = $this->meetingRequest
        ->where('date', '>=', $today) // MeetingRequest yang akan datang
        ->orderBy('date', 'asc')
        ->orderBy('time', 'asc') // Urutkan dari yang terdekat ke yang terjauh
        ->take(10) // Ambil hingga 10 data
        ->get();

        return $upcomingMeetingRequests;
    }
    

    public function getById($id)
    {
        return $this->meetingRequest->find($id);
    }

    public function store($data)
    {
        return $this->meetingRequest->create($data);
    }

    public function update($id, $data)
    {
        $meetingRequest = $this->meetingRequest->find($id);
        $meetingRequest->update($data);
        return $meetingRequest;
    }

    public function delete($id)
    {
        $meetingRequest = $this->meetingRequest->find($id);
        $meetingRequest->delete();
        return $meetingRequest;
    }
}