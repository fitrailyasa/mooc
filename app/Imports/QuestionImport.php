<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class QuestionImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {

        $category = Category::where('name', $row[1])->first();

        if (!$category) {
            $category = Category::create([
                'name' => $row[1],
            ]);
        }

        $checkQuestion = Question::where('name', $row[2])->first();

        if ($checkQuestion) {
            $checkQuestion->update([
                'category_id' => $category->id,
            ]);

            return null;
        }

        return new Question([
            'name' => $row[2],
            'category_id' => $category->id ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
