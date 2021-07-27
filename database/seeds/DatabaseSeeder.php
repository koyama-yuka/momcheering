<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            M_RelationshipsTableSeeder::class,
            M_GendersTableSeeder::class,
            M_BloodtypesTableSeeder::class,
            M_Blood_rhTableSeeder::class,
        ]);
    }
}
