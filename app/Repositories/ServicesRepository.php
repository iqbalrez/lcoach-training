<?php

namespace App\Repositories;
use App\Models\Services;
use App\Interfaces\ServicesInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServicesRepository implements ServicesInterface
{
    private $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function getAll()
    {
        return $this->services->orderBy('title', 'asc')->get();
    }
    
    public function getById($id)
    {
        return $this->services->find($id);
    }

    private function generateSlug($title)
    {
        $slug = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);

        // check slug exist
        $slugExist = $this->services->where('slug', $slug)->first();

        if ($slugExist) {
            $slug = $slug . '-' . uniqid();
        }

        return $slug;
    }

    public function store($data)
    {
        $fileNameImage = uniqid() . '.' . $data['image']->extension();
        $data['image']->storeAs('public/services', $fileNameImage);
        $data['image'] = $fileNameImage;

        DB::beginTransaction();
        try {
            $services = $this->services->create($data);
            DB::commit();
            return $services;
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete('public/services/' . $fileNameImage);
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        $services = $this->services->find($id);
        if (isset($data['image'])) {
            $filename = uniqid() . '.' . $data['image']->extension();
            $data['image']->storeAs('public/services', $filename);
            $data['image'] = $filename;

            if ($services->image != null) {
                Storage::delete('public/services/' . $services->image);
            }
        }

        $data['slug'] = $this->generateSlug($data['title']);

        $services->update($data);
        
        return $services;
    }

    public function delete($id)
    {
        $services = $this->services->find($id);

        Storage::delete('public/services/' . $services->image);

        DB::beginTransaction();
        try {
            $services->delete();
            DB::commit();
            return $services;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function getBySlug($slug)
    {
        return $this->services->where('slug', $slug)->first();
    }
}