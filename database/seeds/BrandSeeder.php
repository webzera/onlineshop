<?php

use Illuminate\Database\Seeder;

use App\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand= new Brand();
        $brand->name='Nokia';
        $brand->description='nokia';
        $brand->save();

        $brand= new Brand();
        $brand->name='Honda';
        $brand->description='honda';
        $brand->save();

        $brand= new Brand();
        $brand->name='Bajaj';
        $brand->description='bajaj';
        $brand->save();
    }
}
