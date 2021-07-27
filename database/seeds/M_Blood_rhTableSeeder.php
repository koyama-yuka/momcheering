<?php

use Illuminate\Database\Seeder;

class M_Blood_rhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_blood_rh')->insert([
            
            [
                'blood_rh' => '+',
            ],
            
            [
                'blood_rh' => '-',
            ],
            
            [
                'blood_rh' => '不明',
            ],
            
        ]);
    }
}
