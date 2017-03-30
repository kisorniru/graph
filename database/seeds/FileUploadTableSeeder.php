<?php

use Illuminate\Database\Seeder;

class FileUploadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('fileUpload')->insert([
                'data1' => $faker->randomDigit,
                'data2' => $faker->randomDigit,
                'data3' => $faker->randomDigit,
                'data4' => $faker->randomDigit,
                'data5' => $faker->randomDigit,
                'data6' => $faker->randomDigit,
            ]);
        }
    }
}
