<?php

namespace App\Interfaces;

interface MeetingRequestInterface
{
    public function getAll();
    public function getUpcoming();
    public function getById($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);
}