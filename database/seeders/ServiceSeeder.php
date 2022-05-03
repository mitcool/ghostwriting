<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
    	$services_de = [
    		'Literaturrecherche',
			'Themenvorschlag',
			'Gliederung',
			'Exposé / Proposal',
			'Capstone-Paper',
			'Essay',
			'Hausarbeit & Seminararbeit',
			'Juristische Gutachten',
			'Projektarbeit',
			'Diplomarbeit',
			'Bachelorarbeit',
			'Masterarbeit',
			'Magisterarbeit',
			'Staatsexamensarbeit',
			'CAS-Arbeit',
			'Doktorarbeit & PhD-Arbeit',
			'Disputation',
			'Promotionsberatung',
			'Fachartikel',
			'Abstract',
			'Zusammenfassung / Exzerpt',
			'Referat & Powerpointpräsentation',
			'Corporate Book',
			'Businessplan',
			'Marktanalyse',
			'Fallstudie',
			'Qualitatives Interview',
			'Quantitatives Interview',
			'Wissenschaftliches Review', 
			'Bewerbung & Lebenslauf',
			'Verlagsveröffentlichung',
			'Peer-Review-Veröffentlichung',
			'Übersetzungen',
			'Statistische Auswertungen',
			'Korrektorat',
			'Lektorat',
			'Paraphrasieren',
			'Transkriptionen',
			'Formatierungsarbeiten',
			'Plagiatsprüfung',
		];


        $services = [
	    	'Literature Research',
			'Topic Proposal',
			'Outline',
			'Exposé / Proposal',
			'Capstone Paper',
			'Essay',
			'Term Paper & Seminar Paper',
			'Legal Term Paper',
			'Project Thesis',
			'Diploma Thesis',
			'Bachelor Thesis',
			'Master Thesis',
			'Magister Thesis',
			'State Examination Thesis',
			'CAS Thesis',
			'Doctoral Thesis & PhD Thesis',
			'Disputation',
			'Doctoral Advisory',
			'Scientific Article',
			'Abstract',
			'Summary / Excerpt',
			'Handout & Powerpoint Presentation',
			'Corporate Book',
			'Business Plan',
			'Market Analysis',
			'Case Study',
			'Qualitative Interview',
			'Quantitative Interview',
			'Scientific Review',
			'Motivation Letter & CV',
			'Publisher Publication',
			'Peer Review Publication',
			'Translations',
			'Statistical Analysis',
			'Proofreading',
			'Editing',
			'Paraphrasing',
			'Transcriptions',
			'Formatting',
			'Plagiarism Check',
	    ];

		if(Db::table('services')->count() == 0){
			for ($i = 0; $i <count($services); $i++) {
	    		DB::table('services')->insert([
		            'name' => $services[$i],
		            'name_de' => $services_de[$i],
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
					'slug' => Str::slug($services[$i])
		        ]);
	    	}
		}
    }
}
