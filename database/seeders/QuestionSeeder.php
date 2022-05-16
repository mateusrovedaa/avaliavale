<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'name' => 'Qual a melhor coisa da empresa?',
            'type' => 'text',
            'category_id' => Category::all()->first()->id,
        ]);

        DB::table('questions')->insert([
            'name' => 'Qual sua nota para a empresa?',
            'type' => 'number',
            'category_id' => Category::all()->first()->id,
        ]);

        DB::table('questions')->insert([
            'name' => 'Qual seu produto favorito?',
            'type' => 'list',
            'valid_answers' => '["banana", "maça", "palitos salgados bom dia alimentos"]',
            'category_id' => Category::all()->first()->id,
        ]);
    }
}
