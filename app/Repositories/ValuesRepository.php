<?php

namespace App\Repositories;
use App\Models\Values;
use App\Interfaces\ValuesInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ValuesRepository implements ValuesInterface
{
    private $values;

    public function __construct(Values $values)
    {
        $this->values = $values;
    }

    public function getAll()
    {
        return $this->values->orderBy('created_at', 'asc')->get();
    }
    
    public function getById($id)
    {
        return $this->values->find($id);
    }

    public function store($data)
    {
        $fileNameImage = uniqid() . '.' . $data['image']->extension();
        $data['image']->storeAs('public/values', $fileNameImage);
        $data['image'] = $fileNameImage;

        DB::beginTransaction();
        try {
            $values = $this->values->create($data);
            DB::commit();
            return $values;
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete('public/values/' . $fileNameImage);
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        $values = $this->values->find($id);

        if (isset($data['image'])) {
            $filename = uniqid() . '.' . $data['image']->extension();
            $data['image']->storeAs('public/values', $filename);
            $data['image'] = $filename;

            if ($values->image != null) {
                Storage::delete('public/values/' . $values->image);
            }
        }
        $values->update($data);
        return $values;
    }

    public function delete($id)
    {
        $values = $this->values->find($id);

        Storage::delete('public/values/' . $values->image);

        DB::beginTransaction();
        try {
            $values->delete();
            DB::commit();
            return $values;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}