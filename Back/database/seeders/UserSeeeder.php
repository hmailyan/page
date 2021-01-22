<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => Str::random(10),
            'email' => 'admin@mail.ru',
            'age' => 21,
            'password' => Hash::make('admin1'),
            'type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Daniel',
            'surname' => 'Chester',
            'email' => 'dan@mail.ru',
            'age' => 25,
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
        'name' => 'Richmond',
        'surname' => 'Wolter',
        'email' => 'richi@mail.ru',
        'age' => 25,
        'password' => Hash::make('password'),
    ]);
    }
}
