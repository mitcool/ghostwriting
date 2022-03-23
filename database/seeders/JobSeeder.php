<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class JobSeeder extends Seeder
{
   
    public function run()
    {
    	$jobs = [
	    	'Author',
			'Translator',
			'Editor',
			'Proofreader',
			'Analyst',
			'Text formatter',
			'Transcriptionist',
			'Statistician', ];

		if(Db::table('jobs')->count() == 0){
			foreach ($jobs as $job) {
	    		DB::table('jobs')->insert([
		            'name' => $job,
		        ]);
	    	}
		}
    	
    }
}
