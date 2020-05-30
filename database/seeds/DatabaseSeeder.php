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
        // $this->call(RoleTableSeeder::class);
        // $this->call(AdminRoleTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(VariantSeeder::class);
        // $this->call(BrandSeeder::class);
        // $this->call(SpecificationHeaderSeeder::class);
        // $this->call(AttributeSeeder::class);
        

        
        // $this->call(ProductSeeder::class);
        $this->call(ProductCategorySeeder::class);
        

    }
}
