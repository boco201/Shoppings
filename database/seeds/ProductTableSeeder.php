<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
        	'title' => 'Chemise rouge',
        	'description' => 'Sometimes you want to use the collapse plugin to trigger hidden content elsewhere on the page. Because our plugin works on the id and data-target matching, that’s easily done!',
        	'sku' => '0000001',
        	'price' => 23,
        	'category_id' => '1'

        	
        	
        ]);

         Product::create([
        	'title' => 'pantalon rouge',
        	'description' => 'Sometimes you want to use the collapse plugin to trigger hidden content elsewhere on the page. Because our plugin works on the id and data-target matching, that’s easily done!',
        	'sku' => '0000002',
        	'price' => 27,
        	'category_id' => '2'
        	
        ]);

          Product::create([
        	'title' => 'Chemise blanc',
        	'description' => 'Sometimes you want to use the collapse plugin to trigger hidden content elsewhere on the page. Because our plugin works on the id and data-target matching, that’s easily done!',
        	'sku' => '0000003',
        	'price' => 22,
        	'category_id' => '1'
        	
        ]);

           Product::create([
        	'title' => 'Chemise bleu',
        	'description' => 'Sometimes you want to use the collapse plugin to trigger hidden content elsewhere on the page. Because our plugin works on the id and data-target matching, that’s easily done!',
        	'sku' => '0000004',
        	'price' => 28,
        	'category_id' => '1'
        	

        ]);
    }
}
