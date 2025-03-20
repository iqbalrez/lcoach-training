<?php

namespace App\Interfaces;

interface WebConfigInterface
{
    public function getConfig();
    public function update($data);
}