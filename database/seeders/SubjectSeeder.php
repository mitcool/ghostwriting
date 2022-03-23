<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubjectSeeder extends Seeder
{
    
    public function run()
    {
        $subjects = [
			'Business & Economics',
			'Law',
			'Social Sciences',
			'Humanities',
			'Structural Sciences',
			'Cultural Sciences',
			'Languages & Cultures',
			'Engineering',
			'Agricultural & Natural Sciences',
			'Medicine',
		];
		
		if(Db::table('subjects')->count() == 0){
			foreach ($subjects as $subject) {
	    		DB::table('subjects')->insert([
		            'name' => $subject,
		        ]);
	    	}
		}
    }
}
