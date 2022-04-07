<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FaqSeeder extends Seeder
{
    
    public function run()
    {
  
		if(DB::table('faqs')->where('type',0)->count() == 0){
			for ($i=0; $i < 10; $i++) { 
				DB::table('faqs')->insert([
					'question_en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
					'question_de' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
					'answer_en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'answer_de' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'type' => 0,
				]);
			}
		}


		if(DB::table('faqs')->where('type',1)->count() == 0){
			for ($i=0; $i < 10; $i++) { 
				DB::table('faqs')->insert([
					'question_en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
					'question_de' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
					'answer_en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'answer_de' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
					'type' => 1,
				]);
			}
		}
    }
}
