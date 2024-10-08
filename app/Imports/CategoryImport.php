<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CategoryImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];

        $checkCategory = Category::where('name', $name)->first();

        if (!$checkCategory) {
            return new Category([
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
