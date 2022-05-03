<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class DisciplineSeeder extends Seeder
{
    public function run()
    {
        $disciplines = [
	    	'Business Studies & Business Management',
			'Economics',
			'Financial Science',
			'Law',
			'Computer Science & Mathematics',
			'Engineering & Technology',
			'Architecture',
			'Arts, Design & Music',
			'Literary Studies & German Studies',
			'Philosophy & History',
			'Linguistics & Cultural Studies',
			'Political Science',
			'Education & Pedagogy',
			'Media & Communication',
			'Social Sciences',
			'Social work',
			'Sociology',
			'Agriculture & Forestry',
			'Biology',
			'Chemistry',
			'Medicine & Public Health',
			'Dental Medicine',
			'Nursing Science',
			'Psychology',

	    ];

	    $disciplines_de = [
	    	'Wirtschaftswissenschaften & BWL',
			'Volkswirtschaftslehre (VWL)',
			'Finanzwissenschaften',
			'Rechtswissenschaften',
			'Informatik & Mathematik',
			'Ingenieurwesen &Technik',
			'Architektur',
			'Kunst, Gestaltung & Musik',
			'Literaturwissenschaften & Germanistik',
			'Philosophie & Geschichte',
			'Sprachwissenschaften & Kulturwissenschaften',
			'Politikwissenschaften',
			'Bildung & Erziehung',
			'Medien & Kommunikation',
			'Sozialwissenschaften',
			'Soziale Arbeit',
			'Soziologie',
			'Agrar- & Forstwissenschaften',
			'Biologie',
			'Chemie',
			'Medizin & Öffentliche Gesundheit',
			'Zahnmedizin',
			'Pflegewissenschaften',
			'Psychologie',

	    ];

		if(Db::table('disciplines')->count() == 0){
			for ($i=0; $i < count($disciplines); $i++) {
	    		DB::table('disciplines')->insert([
		            'name' => $disciplines[$i],
		            'name_de' =>$disciplines_de[$i],
		            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'description_de'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					 'slug' => Str::slug($disciplines[$i])
		        ]);
	    	}
		}
    }
}
