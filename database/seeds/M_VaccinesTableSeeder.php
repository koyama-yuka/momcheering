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
                'vaccine_name' => 'Hib(ヒブ)ワクチン',
                'vaccine_times' => '4',
                'display_order' => '1',
            ],
            
            [
                'vaccine_name' => '小児用肺炎球菌ワクチン',
                'vaccine_times' => '4',
                'display_order' => '2',
            ],
            
            [
                'vaccine_name' => 'B型肝炎ワクチン',
                'vaccine_times' => '3',
                'display_order' => '3',
            ],
            
            [
                'vaccine_name' => 'ロタウイルスワクチン',
                'vaccine_times' => '3',
                'display_order' => '4',
            ],
            
            [
                'vaccine_name' => '4種混合ワクチン(DPT-IPV)',
                'vaccine_times' => '4',
                'display_order' => '5',
            ],
            
            [
                'vaccine_name' => 'BCGワクチン',
                'vaccine_times' => '1',
                'display_order' => '6',
            ],
            
            [
                'vaccine_name' => 'MR(麻しん風しん混合)ワクチン',
                'vaccine_times' => '2',
                'display_order' => '7',
            ],
            
            [
                'vaccine_name' => '水痘(みずぼうそう)ワクチン',
                'vaccine_times' => '2',
                'display_order' => '8',
            ],
            
            [
                'vaccine_name' => 'おたふくかぜワクチン',
                'vaccine_times' => '2',
                'display_order' => '9',
            ],
            
            [
                'vaccine_name' => '日本脳炎ワクチン',
                'vaccine_times' => '4',
                'display_order' => '10',
            ],
            
            [
                'vaccine_name' => 'HPV(ヒトパピローマウイルス)ワクチン',
                'vaccine_times' => '3',
                'display_order' => '11',
            ],
            
            [
                'vaccine_name' => 'その他',
                'vaccine_times' => '',
                'display_order' => '12',
            ],
            
        ]);
    }
}
