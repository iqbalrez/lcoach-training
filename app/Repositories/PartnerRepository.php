<?php

namespace App\Repositories;
use App\Models\Partner;
use App\Interfaces\PartnerInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartnerRepository implements PartnerInterface
{
    private $partner;

    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    public function getAll()
    {
        return $this->partner->orderBy('name', 'asc')->get();
    }
    
    public function getById($id)
    {
        return $this->partner->find($id);
    }

    public function store($data)
    {
        $fileNameImage = uniqid() . '.' . $data['logo']->extension();
        $data['logo']->storeAs('public/partners', $fileNameImage);
        $data['logo'] = $fileNameImage;

        DB::beginTransaction();
        try {
            $partner = $this->partner->create($data);
            DB::commit();
            return $partner;
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete('public/partners/' . $fileNameImage);
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        $partner = $this->partner->find($id);
        $partner->update($data);
        return $partner;
    }

    public function delete($id)
    {
        $partner = $this->partner->find($id);

        Storage::delete('public/partners/' . $partner->logo);

        DB::beginTransaction();
        try {
            $partner->delete();
            DB::commit();
            return $partner;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}