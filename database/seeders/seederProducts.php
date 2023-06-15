<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class seederProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsData = [
            [
                'id' => 1,
                'name' => 'Tierra',
                'price' => 1800,
                'stock' => 100,
                'description' => 'Hamburguesa simple clasica con queso cheddar, cebolla, lechuga y tomate con aderezo opcional.',
                'product_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://www.pngitem.com/pimgs/m/57-579572_imagenes-de-hamburguesas-png-transparent-png.png',
            ],
            [
                'id' => 2,
                'name' => 'Jupiter',
                'price' => 2350,
                'stock' => 100,
                'description' => 'Hamburguesa triple con queso cheddar, cebolla, panceta, huevo frito y doble aderezo opcional.',
                'product_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://www.pngitem.com/pimgs/m/57-579572_imagenes-de-hamburguesas-png-transparent-png.png',
            ],
            [
                'id' => 3,
                'name' => 'Neptuno',
                'price' => 2000,
                'stock' => 100,
                'description' => 'Hamburguesa simple con queso azul, queso de cabra, rucula y tomate con alioli.',
                'product_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://www.pngitem.com/pimgs/m/57-579572_imagenes-de-hamburguesas-png-transparent-png.png',
            ],
            [
                'id' => 4,
                'name' => 'Coca Cola',
                'price' => 200,
                'stock' => 100,
                'description' => 'Vaso de 300ml de Coca Cola.',
                'product_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://w7.pngwing.com/pngs/685/904/png-transparent-fizzy-drinks-coca-cola-diet-coke-rc-cola-coca-cola-food-cola-soft-drink.png',
            ],
            [
                'id' => 5,
                'name' => 'Fanta',
                'price' => 200,
                'stock' => 100,
                'description' => 'Vaso de 300ml de Fanta.',
                'product_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://w7.pngwing.com/pngs/629/634/png-transparent-fanta-fizzy-drinks-coca-cola-juice-appletiser-guarana-antartica-food-orange-non-alcoholic-beverage.png',
            ],
            [
                'id' => 6,
                'name' => 'Sprite',
                'price' => 200,
                'stock' => 100,
                'description' => 'Vaso de 300ml de Sprite.',
                'product_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://superlago.com.ar/wp-content/uploads/2021/04/web03.png',
            ],
            [
                'id' => 7,
                'name' => 'Papas cosmicas',
                'price' => 1700,
                'stock' => 100,
                'description' => 'Papas baston con crema de verdeo y panceta.',
                'product_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://media.a24.com/p/72b5913680a9f8955de0ceaaefba01ca/adjuntos/296/imagenes/009/153/0009153815/1200x675/smart/el-arte-las-papas-la-receta-fritas-caseras-tecnicas-y-consejos-un-resultado-irresistible.png',
            ],
            [
                'id' => 8,
                'name' => 'Papas clasicas',
                'price' => 850,
                'stock' => 100,
                'description' => 'Papas baston simples.',
                'product_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'https://media.a24.com/p/72b5913680a9f8955de0ceaaefba01ca/adjuntos/296/imagenes/009/153/0009153815/1200x675/smart/el-arte-las-papas-la-receta-fritas-caseras-tecnicas-y-consejos-un-resultado-irresistible.png',
            ],
        ];

        DB::table('products')->insert($productsData);
    }
}