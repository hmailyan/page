<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'Sport',
            'user_id' => 2,
            'description' => 'The singular term "sport" is used in most English dialects to describe the overall concept , with "sports" used to describe multiple activities. American English uses "sports" for both terms.'
         ]);
        DB::table('blogs')->insert([
           'title' => 'Animal',
            'user_id' => 3,
            'description' => 'The word "animal" comes from the Latin animalis, meaning having breath, having soul or living being. The biological definition includes all members of the kingdom Animalia.'
        ]);
    }
}
