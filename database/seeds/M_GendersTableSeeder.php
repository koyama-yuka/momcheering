<?php

use Illuminate\Database\Seeder;

class M_GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_genders')->insert([
            [
                'gender' => '男の子',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'gender' => '女の子',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
            [
                'gender' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        
        ]);
    }
}
