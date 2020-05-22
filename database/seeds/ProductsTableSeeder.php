<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'id'         => 1,
                'name'       => 'BURGER',
                'description' => 'Beef patty on a soft bun with onions, pickles and ketchup.',
                'price' => '1.00',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/NCI_Visuals_Food_Hamburger.jpg/1024px-NCI_Visuals_Food_Hamburger.jpg',
            ],
            [
                'id'         => 2,
                'name'       => 'CHEESEBURGER',
                'description' => 'Beef patty on a seeded bun with onions, pickles, cheese and ketchup.',
                'price' => '2.00',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/NCI_Visuals_Food_Hamburger.jpg/1024px-NCI_Visuals_Food_Hamburger.jpg',
            ],
            [
                'id'         => 3,
                'name'       => 'DOUBLECHEESE',
                'description' => '2 Beef patties on a seeded bun with onions, pickles, cheese and ketchup.',
                'price' => '3.00',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/NCI_Visuals_Food_Hamburger.jpg/1024px-NCI_Visuals_Food_Hamburger.jpg',
            ],
            [
                'id'         => 4,
                'name'       => 'CLASSIC',
                'description' => 'Beef patty on a soft bun with onions, lettuce, tomato, cheese and burger sauce.',
                'price' => '2.50',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/NCI_Visuals_Food_Hamburger.jpg/1024px-NCI_Visuals_Food_Hamburger.jpg',
            ],
            [
                'id'         => 5,
                'name'       => 'DOUBLECLASSIC',
                'description' => '2 Beef patties with onions, lettuce, tomato, cheese and burger sauce.',
                'price' => '4.00',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/NCI_Visuals_Food_Hamburger.jpg/1024px-NCI_Visuals_Food_Hamburger.jpg',
            ],      
            [
                'id'         => 6,
                'name'       => 'SUPREME',
                'description' => 'Beef patty on a seeded bun with onions, pickles, bacon, cheese and BBQ sauce.',
                'price' => '3.00',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/NCI_Visuals_Food_Hamburger.jpg/1024px-NCI_Visuals_Food_Hamburger.jpg',
            ],
        ];
        Product::insert($products);
    }
}