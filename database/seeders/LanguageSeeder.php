<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LanguageSeeder extends Seeder
{
   
    public function run()
    {
        $languages = [
        	'English',
			'German',
			'French',
			'Spanish',
			'Italian',
			'Dutch',
			'Polish',
			'Slovak',
			'Other',
		];
		
		if(Db::table('languages')->count() == 0){
			foreach ($languages as $language) {
	    		DB::table('languages')->insert([
		            'name' => $language,
		        ]);
	    	}
		}
    }
}
