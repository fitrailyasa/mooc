<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => Str::uuid(),
                'name' => 'Quest 1',
                'category_id' => $this->Category('Operational'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Quest 1',
                'category_id' => $this->Category('Technical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Quest 1',
                'category_id' => $this->Category('Social'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Quest 1',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Quest 1',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Question::query()->insert($data);
    }

    private function Category(string $name): string
    {
        $Category = Category::where('name', $name)->first();
        if (!$Category) {
            $Category = Category::create([
                'id' => Str::uuid(),
                'name' => $name,
            ]);
        }
        return $Category->id;
    }
}
