<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    private function wordsLimit($text, $limit = 50, $end = '...') {
         $text = strip_tags($text);
         $words = explode(' ', $text);
         if($limit < 1 || sizeof($words) <= $limit) {
            return $text;
         }
         $words = array_slice($words, 0, $limit);
         $output = implode(' ' , $words);
         return $output.$end;
    }

    public function formatted_description(){

    	return Session::get('locale')=='de' 
    		? $this->wordsLimit($this->description_de,30)
    		: $this->wordsLimit($this->description_en,30);

    } 
}
