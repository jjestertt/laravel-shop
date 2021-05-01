<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++)
            DB::table('products')->insert([
                'title' => 'Title' . $i,
                'price' => rand(200, 1500),
                'in_stock' => 1,
                'description' => 'Повседневная практика показывает, что рамки и место обучения кадров в значительной степени обуславливает создание форм развития. Задача организации, в особенности же укрепление и развитие структуры способствует подготовки и реализации системы обучения кадров, соответствует насущным потребностям. Не следует, однако забывать, что рамки и место обучения кадров способствует подготовки и реализации дальнейших направлений развития.',
                'product_categories_id' => rand(1, 3),
            ]);
    }
}
