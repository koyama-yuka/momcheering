<?php

use Illuminate\Database\Seeder;

class M_BloodtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_bloodtypes')->insert([
            [
                'blood_type' => 'A',
            ],
            
            [
                'blood_type' => 'B',
            ],
            
            [
                'blood_type' => 'O',
            ],
            
            [
                'blood_type' => 'AB',
            ],
            
            [
                'blood_type' => '不明',
            ],
            
        ]);
    }
}
