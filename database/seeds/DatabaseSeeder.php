<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $tables = [

        'lessons',
        'tags',
        'lesson_tag'

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->cleanDatabase();


        $this->call(LessonsTableSeeder::class);

        $this->call(TagsTableSeeder::class);

        $this->call(LessonTagTableSeeder::class);
        
    }


    public function cleanDatabase()
    {

        // Ako se ne ukloni foreign key check
        // nece moci da se obrisu redovi

        DB::statement('SET FOREIGN_KEY_CHECKS=0');


        foreach ($this->tables as $tableName) {
            
            DB::table($tableName)->truncate();

        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }

}
