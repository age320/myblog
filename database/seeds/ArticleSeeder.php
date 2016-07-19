<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('article')->delete();
        for($i=0;$i<10;$i++){
        	\App\Model\Article::create([
        			'title' => 'Title'.$i,
        			'content' => 'Content'.$i,
        			'user_id' => 1,
        			'cate_id' => $i,
        		]);
        }
    }
}
