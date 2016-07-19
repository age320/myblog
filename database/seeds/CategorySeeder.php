<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        for($i=0;$i<3;$i++){
        	\App\Model\Category::create([
        		'name'=>'PHP'.$i,
        		]);
        }
    }
}
