<?php

use Illuminate\Database\Seeder;
use App\Variant;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variant= new Variant();
        $variant->name='Color';
        $variant->description='Color';
        $variant->save();

        $variant= new Variant();
        $variant->name='Litre';
        $variant->description='Litre';
        $variant->save();

        $variant= new Variant();
        $variant->name='Kilo gram';
        $variant->description='Kilo gram';
        $variant->save();

        $variant= new Variant();
        $variant->name='Size';
        $variant->description='size';
        $variant->save();

        $variant= new Variant();
        $variant->name='Refill';
        $variant->description='Refill';
        $variant->save();
    }
}
