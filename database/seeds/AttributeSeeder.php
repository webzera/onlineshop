<?php

use Illuminate\Database\Seeder;
use App\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute= new Attribute();
        $attribute->name='Color';
        $attribute->description='Color';
        $attribute->created_by=1;
        $attribute->update_by=1;
        $attribute->save();

        $attribute= new Attribute();
        $attribute->name='Litre';
        $attribute->description='Litre';
        $attribute->created_by=1;
        $attribute->update_by=1;
        $attribute->save();

        $attribute= new Attribute();
        $attribute->name='Kilo gram';
        $attribute->description='Kilo gram';
        $attribute->created_by=1;
        $attribute->update_by=1;
        $attribute->save();

        $attribute= new Attribute();
        $attribute->name='Size';
        $attribute->description='size';
        $attribute->created_by=1;
        $attribute->update_by=1;
        $attribute->save();

        $attribute= new Attribute();
        $attribute->name='Refill';
        $attribute->description='Refill';
        $attribute->created_by=1;
        $attribute->update_by=1;
        $attribute->save();
    }
}
