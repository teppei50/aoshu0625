<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuchusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('Juchus')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'kyakusaki_id'=> 1,
                'item_id'=> 21,
                'kosu'=> 5,
                'joutai'=> 0,
                'user_id'=> 1,
                
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'kyakusaki_id'=> 2,
                'item_id'=> 22,
                'kosu'=> 8,
                'joutai'=> 0,
                'user_id'=> 2,
            ],
           
        ]);
            
    }
}