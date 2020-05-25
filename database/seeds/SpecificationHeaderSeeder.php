<?php

use Illuminate\Database\Seeder;

use App\SpecificationHeader;

class SpecificationHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specificationHeader= new SpecificationHeader();
        $specificationHeader->name='General';
        $specificationHeader->description='General';
        $specificationHeader->created_by=1;
        $specificationHeader->update_by=1;
        $specificationHeader->save();

        $specificationHeader= new SpecificationHeader();
        $specificationHeader->name='Product Details';
        $specificationHeader->description='Product Details';
        $specificationHeader->created_by=1;
        $specificationHeader->update_by=1;
        $specificationHeader->save();

        $specificationHeader= new SpecificationHeader();
        $specificationHeader->name='Dimensions';
        $specificationHeader->description='Dimensions';
        $specificationHeader->created_by=1;
        $specificationHeader->update_by=1;
        $specificationHeader->save();

        $specificationHeader= new SpecificationHeader();
        $specificationHeader->name='Warranty';
        $specificationHeader->description='Warranty';
        $specificationHeader->created_by=1;
        $specificationHeader->update_by=1;
        $specificationHeader->save();

        $specificationHeader= new SpecificationHeader();
        $specificationHeader->name='More Details';
        $specificationHeader->description='More Details';
        $specificationHeader->created_by=1;
        $specificationHeader->update_by=1;
        $specificationHeader->save();
    }
}
