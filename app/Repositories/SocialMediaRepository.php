<?php

namespace App\Repositories;
use App\Models\SocialMedia;
use App\Interfaces\SocialMediaInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SocialMediaRepository implements SocialMediaInterface
{
    private $socialMedia;

    public function __construct(SocialMedia $socialMedia)
    {
        $this->socialMedia = $socialMedia;
    }

    public function getAll()
    {
        return $this->socialMedia->orderBy('app', 'asc')->get();
    }
    
    public function getById($id)
    {
        return $this->socialMedia->find($id);
    }

    public function store($data)
    {
        $fileNameImage = uniqid() . '.' . $data['icon']->extension();
        $data['icon']->storeAs('public/social_media', $fileNameImage);
        $data['icon'] = $fileNameImage;

        DB::beginTransaction();
        try {
            $socialMedia = $this->socialMedia->create($data);
            DB::commit();
            return $socialMedia;
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete('public/social_media/' . $fileNameImage);
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        $socialMedia = $this->socialMedia->find($id);

        if (isset($data['icon'])) {
            $filename = uniqid() . '.' . $data['icon']->extension();
            $data['icon']->storeAs('public/social_media', $filename);
            $data['icon'] = $filename;

            if ($socialMedia->image != null) {
                Storage::delete('public/social_media/' . $socialMedia->icon);
            }
        }
        $socialMedia->update($data);
        return $socialMedia;
    }

    public function delete($id)
    {
        $socialMedia = $this->socialMedia->find($id);

        Storage::delete('public/social_media/' . $socialMedia->icon);

        DB::beginTransaction();
        try {
            $socialMedia->delete();
            DB::commit();
            return $socialMedia;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}