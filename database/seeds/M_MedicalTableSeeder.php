<?php

use Illuminate\Database\Seeder;

class M_MedicalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_medical')->insert([
            
            [
                'medicalcheck_name' => '生後１ヶ月健診',
                'display_order' => '1',
            ],
            
             [
                'medicalcheck_name' => '生後３～４ヶ月健診',
                'display_order' => '2',
            ],
            
             [
                'medicalcheck_name' => '生後６～７ヶ月健診',
                'display_order' => '3',
            ],
            
             [
                'medicalcheck_name' => '生後９～１０ヶ月健診',
                'display_order' => '4',
            ],
            
             [
                'medicalcheck_name' => '１２ヶ月健診',
                'display_order' => '5',
            ],
            
             [
                'medicalcheck_name' => '１歳６ヶ月健診',
                'display_order' => '6',
            ],
            
             [
                'medicalcheck_name' => '２歳児健診',
                'display_order' => '7',
            ],
            
             [
                'medicalcheck_name' => '３歳児健診',
                'display_order' => '8',
            ],
            
             [
                'medicalcheck_name' => '４歳児健診',
                'display_order' => '9',
            ],
            
            
            [
                'medicalcheck_name' => '５歳児健診',
                'display_order' => '10',
            ],
            
            [
                'medicalcheck_name' => '６歳児健診',
                'display_order' => '11',
            ],
            
            [
                'medicalcheck_name' => 'その他',
                'display_order' => '12',
            ],
            
            
        ]);
    }
}
