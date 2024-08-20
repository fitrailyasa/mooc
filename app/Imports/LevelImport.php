<?php

namespace App\Imports;

use App\Models\Level;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LevelImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $code = $row[2];
        $value = $row[3];

        $checkLevel = Level::where('name', $name)->first();

        if (!$checkLevel) {
            return new Level([
                'id' => Str::uuid(),
                'name' => $name,
                'code' => $code,
                'value' => $value,
            ]);
        }

        return null;
    }

    public function startRow(): int
    {
        return 3;
    }
}
