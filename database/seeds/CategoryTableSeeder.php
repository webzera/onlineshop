<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i <= 5; $i++){
        	$category = Category::create([
        		'name' => ucfirst($faker->word),   
        		'order' => 1,     		
        		'slug' => Str::of($faker->word.$faker->numberBetween(1,999))->slug('-'),
        	]);

        	for($j=1; $j <= 4; $j++){
	        	$childcategory = $category->childCategories()->create([
	        		'name' => $faker->sentence(2),
	        		'order' => 2,
	        		'slug' => Str::of($faker->word.$faker->numberBetween(1,999))->slug('-'),
	        	]);

	        	for($k=1; $k <= 3; $k++){
		        	$childcategory->childCategories()->create([
		        		'name' => $faker->sentence(2),
		        		'order' => 3,
		        		'slug' => Str::of($faker->word.$faker->numberBetween(1,999))->slug('-'),
		        	]);
	        	}
        	}

        }
    }
}
