<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
           'Teacher1',
           'Teacher2',
           'Teacher3',
           'Teacher4',
           'Teacher5'
        ];

        foreach ($teachers as $teacher) {
             Teacher::create(['name' => $teacher]);
        }
    }
}
