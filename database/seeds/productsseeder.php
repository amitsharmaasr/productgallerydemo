<?php

use Illuminate\Database\Seeder;

class productsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\products::class, 50)->create()->each(function ($products) {

            $productsimages = factory(App\productsimages::class, 5)->make();
            $products->productsimages()->saveMany($productsimages);

            $productsvariants = factory(App\productsvariants::class, 3)->make();
            $products->productsvariants()->saveMany($productsvariants);
        });
    }
}
