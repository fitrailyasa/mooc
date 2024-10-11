<?php

namespace App\Imports;

use App\Models\Expertise;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExpertiseImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];

        $checkExpertise = Expertise::where('name', $name)->first();

        if (!$checkExpertise) {
            return new Expertise([
                'id' => Str::uuid(),
                'name' => $name,
            ]);
        }

        return null;
    }

    public function startRow(): int
    {
        return 3;
    }
}
