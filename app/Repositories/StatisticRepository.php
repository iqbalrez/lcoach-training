<?php

namespace App\Repositories;
use App\Models\Statistic;
use App\Interfaces\StatisticInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StatisticRepository implements StatisticInterface
{
    private $statistic;

    public function __construct(Statistic $statistic)
    {
        $this->statistic = $statistic;
    }

    public function getAll()
    {
        return $this->statistic->get();
    }
    
    public function getById($id)
    {
        return $this->statistic->find($id);
    }

    public function store($data)
    {
        $fileNameImage = uniqid() . '.' . $data['icon']->extension();
        $data['icon']->storeAs('public/statistic', $fileNameImage);
        $data['icon'] = $fileNameImage;

        DB::beginTransaction();
        try {
            $statistic = $this->statistic->create($data);
            DB::commit();
            return $statistic;
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete('public/statistic/' . $fileNameImage);
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        $statistic = $this->statistic->find($id);

        if (isset($data['icon'])) {
            $filename = uniqid() . '.' . $data['icon']->extension();
            $data['icon']->storeAs('public/statistic', $filename);
            $data['icon'] = $filename;

            if ($statistic->image != null) {
                Storage::delete('public/statistic/' . $statistic->image);
            }
        }
        $statistic->update($data);
        return $statistic;
    }

    public function delete($id)
    {
        $statistic = $this->statistic->find($id);

        Storage::delete('public/statistic/' . $statistic->icon);

        DB::beginTransaction();
        try {
            $statistic->delete();
            DB::commit();
            return $statistic;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}