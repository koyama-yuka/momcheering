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
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'relationship' => '父',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'relationship' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            ]);
    }
}
