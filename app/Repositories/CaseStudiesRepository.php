<?php

namespace App\Repositories;

use App\Models\CaseStudies;
use App\Interfaces\CaseStudiesInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CaseStudiesRepository implements CaseStudiesInterface
{
    private $caseStudies;

    public function __construct(CaseStudies $caseStudies)
    {
        $this->caseStudies = $caseStudies;
    }

    public function getAll()
    {
        return $this->caseStudies->orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        $caseStudy = $this->caseStudies->find($id);

        if (!$caseStudy) {
            throw new ModelNotFoundException("Case study not found.");
        }

        return $caseStudy;
    }

    public function store($data)
    {
        if (isset($data['image'])) {
            $filename = uniqid() . '.' . $data['image']->extension();
            $path = $data['image']->storeAs('public/case_studies', $filename);

            if (!$path) {
                throw new \Exception("Failed to upload image.");
            }

            $data['image'] = $filename;
        }
        
        return $this->caseStudies->create($data);
    }

    public function update($id, $data)
    {
        $caseStudy = $this->caseStudies->find($id);

        if (!$caseStudy) {
            throw new ModelNotFoundException("Case study not found.");
        }

        if (isset($data['image'])) {
            // Hapus gambar lama jika ada
            if ($caseStudy->image && Storage::exists('public/case_studies/' . $caseStudy->image)) {
                Storage::delete('public/case_studies/' . $caseStudy->image);
            }

            $filename = uniqid() . '.' . $data['image']->extension();
            $path = $data['image']->storeAs('public/case_studies', $filename);

            if (!$path) {
                throw new \Exception("Failed to upload image.");
            }

            $data['image'] = $filename;
        }

        $caseStudy->update($data);

        return $caseStudy;
    }

    public function delete($id)
    {
        $caseStudy = $this->caseStudies->find($id);

        if (!$caseStudy) {
            throw new ModelNotFoundException("Case study not found.");
        }

        // Hapus gambar jika ada
        if ($caseStudy->image && Storage::exists('public/case_studies/' . $caseStudy->image)) {
            Storage::delete('public/case_studies/' . $caseStudy->image);
        }

        return $caseStudy->delete();
    }
}
