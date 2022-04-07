<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
	    	'Academic Contents',
	    	'Advance Assessment',
			'Bachelor\'s Thesis', 
	    	'Coaching',
	    	'Seminar Paper',
	    	'Motivation Letter',
	    	'Publication',
	    	'Research Papers',
	    	'Research Proposal',
	    	'Language Polishing', 
	    	'Literature Review',
	    	'Management Essay',
	    	'Statistics',
	    	'Term Papers',
	    	'Dissertation',
	    	'Master\'s Thesis',
	    ];

		if(Db::table('services')->count() == 0){
			foreach ($services as $service) {
	    		DB::table('services')->insert([
		            'name' => $service,
		            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					 'slug' => Str::slug($service)
		        ]);
	    	}
		}
    }
}
