<?php

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            [
                'name' => 'Kaos',
                'desc' => 'Catton Combat',
            ],
            [
                'name' => 'Jaket',
                'desc' => 'Hoodie',
            ]
        ]);
    }
}
