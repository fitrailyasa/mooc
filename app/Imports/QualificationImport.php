<?php

namespace App\Imports;

use App\Models\Qualification;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QualificationImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];

        $checkQualification = Qualification::where('name', $name)->first();

        if (!$checkQualification) {
            return new Qualification([
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
