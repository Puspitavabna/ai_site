<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::insert([
        [
            'id' => '1',
            'parent_id' => null,
            'name' => 'Artificial Intelligence'

        ],
            [
                'id' => '2',
                'parent_id' => null,
                'name' => 'Machine Learning'
            ],
            [
                'id' => '3',
                'parent_id' => null,
                'name' => 'Natural Language Processing',
            ]

        ]);

    }
}
