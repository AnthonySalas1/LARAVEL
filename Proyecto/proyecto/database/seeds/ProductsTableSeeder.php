<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'DJI Phantom',
            'slug' => 'dron',
            'details' => 'Conección Bluetooth, cámara 20 MP, Control remoto ',
            'price' => 1250.00,
            'shipping_cost' => 50.00,
            'description' => 'dron',
            'category_id' => 5,
            'brand_id' => 1,
            'image_path' => 'dron.png'
        ]); 
    }
}
