<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->count(4)->state(new Sequence(
            [
                'name' => 'Horacio Alanis m',
                'email'=>'alanisdg@gmail.com',
                'password'=>bcrypt('password'),
                'gender'=>1
            ],
            [
                'name' => 'Maria',
                'email'=>'maria@gmail.com',
                'password'=>bcrypt('password'),
                'gender'=>2
            ],
            [
                'name' => 'Ilse Bermudes',
                'email'=>'ilse@gmail.com',
                'password'=>bcrypt('password'),
                'gender'=>2
            ],
            [
                'name' => 'Juana de Arco',
                'email'=>'juana@gmail.com',
                'password'=>bcrypt('password'),
                'gender'=>2
            ],
            [
                'name' => 'Petrita',
                'email'=>'petrita@gmail.com',
                'password'=>bcrypt('password'),
                'gender'=>2
            ],

        ))->create();
    }
}
