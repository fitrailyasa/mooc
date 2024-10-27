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
                // 'id' => Str::uuid(),
                'name' => 'The extent of the institution\'s commitment to the quality of learning delivered in MOOCs?',
                'category_id' => $this->Category('Organisational'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Do you feel that the policy allows you to utilize the learning outcomes of the MOOCs in accordance with your expectations?',
                'category_id' => $this->Category('Organisational'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How cost-effective is it in achieving learning outcomes?',
                'category_id' => $this->Category('Organisational'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Do MOOCs utilize sustainable technology and can influence education?',
                'category_id' => $this->Category('Organisational'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Does the MOOCs have official accreditation from an educational institution?',
                'category_id' => $this->Category('Technical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How does the MOOCs present educational materials and manage user activities during interaction with the system?',
                'category_id' => $this->Category('Technical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Does the learning video include interactive quizzes or questions to test student understanding?',
                'category_id' => $this->Category('Technical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Can MOOCs be integrated with education administration systems such as class management, and assessment?',
                'category_id' => $this->Category('Technical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Do students feel more motivated and supported through social interaction in MOOCs?',
                'category_id' => $this->Category('Technical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How effective is the communication that MOOCs provide for discussion between students?',
                'category_id' => $this->Category('Social'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How often do students interact and collaborate in group work or assigned projects?',
                'category_id' => $this->Category('Social'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How often do students participate in discussions and answer questions?',
                'category_id' => $this->Category('Social'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How effective are MOOCs in facilitating networking events or virtual meetings?',
                'category_id' => $this->Category('Social'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How easily can students share learning materials or information with fellow students?',
                'category_id' => $this->Category('Social'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Are the learning objectives in the MOOC clear and easy to understand?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Do the teaching methods, such as videos, readings, assignments, and discussions, help you understand the material well?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Are the theories or concepts taught appropriate to the learning objectives and relevant to the subject area?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'To what extent can the learning process implemented by MOOCs help understand basic to more complex material?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How compatible is this type of MOOC with the learning style and needs of educational institutions?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Does Mooc take into account the different backgrounds, needs, and skill levels of students?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'What is the institution\'s ability to evaluate various aspects of the desired output?',
                'category_id' => $this->Category('Pedagogical'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Is the interface of this System MOOC easy to use?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How well is the software system able to fulfill the functions required by the students?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'What is the MOOC system\'s ability to meet timing requirements, such as how many transactions can be processed in one minute?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Does the software integrate well with other systems and tools you use?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Is technical support for this software available and helpful?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How accurate is the output produced by the MOOC system?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How efficiently is feedback or assessment delivered after students have completed assignments or quizzes?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Can the capabilities of the MOOC system change according to the changing needs of students?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Can the system exchange necessary information through interfaces with the different systems operating within the organization?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'Can the product be maintained and developed at a low cost?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How good is the system\'s ability to transform products according to student needs?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'What is the process of moving the system to another environment?',
                'category_id' => $this->Category('Software'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => Str::uuid(),
                'name' => 'How reliable is the system in avoiding failures while operating and meeting needs, even in difficult situations?',
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
