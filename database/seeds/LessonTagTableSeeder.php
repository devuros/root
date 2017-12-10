<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Lesson;

use App\Tag;

class LessonTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	// pluck => [1, 2, 3, 4];
        
        $lessonIds = Lesson::pluck('id')->all();

        $tagIds = Tag::pluck('id')->all();
        

        foreach (range(1,10) as $index) {
        	
        	DB::table('lesson_tag')->insert([

        		'lesson_id'=> $faker->randomElement($lessonIds),
        		'tag_id'=> $faker->randomElement($tagIds)

        	]);

        }

    }
}
