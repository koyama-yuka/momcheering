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
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'blood_type' => 'B',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'blood_type' => 'O',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'blood_type' => 'AB',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'blood_type' => '不明',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
        ]);
    }
}
