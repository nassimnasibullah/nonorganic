<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Slider::insert([

            [
                'title' => 'Toko Non-Organic',
                'description' => 'Duo audire placerat cu, mea et malis dicta. Mei ut invidunt corrumpit voluptaria. Ius no affert principes.',
                'image' => 'girl1.jpg',
            ],
            [
                'title' => 'Toko Non-Organic',
                'description' => 'Duo audire placerat cu, mea et malis dicta. Mei ut invidunt corrumpit voluptaria. Ius no affert principes.',
                'image' => 'girl2.jpg',
            ],
            [
                'title' => 'Toko Non-Organic',
                'description' => 'Duo audire placerat cu, mea et malis dicta. Mei ut invidunt corrumpit voluptaria. Ius no affert principes.',
                'image' => 'girl3.jpg',
            ]
        ]);
    }
}
