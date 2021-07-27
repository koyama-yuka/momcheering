<?php

use Illuminate\Database\Seeder;

class M_RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_relationships')->insert([
            
            [
                'relationship' => '母',
            ],
            
            [
                'relationship' => '父',
            ],
            
            [
                'relationship' => 'その他',
            ],
            
            ]);
    }
}
