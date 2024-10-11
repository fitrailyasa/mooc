<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class QualificationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => Str::uuid(),
                'name' => 'Bachelor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Master',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Doctorate',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Qualification::query()->insert($data);
    }
}
