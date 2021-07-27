<?php

use Illuminate\Database\Seeder;

class M_VaccinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_vaccines')->insert([
            
            [
                'vaccine_name' => '',
                'vaccine_times' => '',
                'display_order' => '',
            ],
            
            
            
        ]);
    }
}
