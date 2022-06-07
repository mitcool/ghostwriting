<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\NewsRequest;
use App\Models\News;


class NewsController extends Controller
{
    
    public function addNews(){
    	return view('admin.news');
    }

    public function createNews(NewsRequest $request){
    	$input = $request->validated();
    	if($request->hasFile('picture')){
    		$picture = $request->file('picture');
    		$fileName = time().'_'.$picture->getClientOriginalName().'.'.$picture->getClientOriginalExtension();
            $filePath = $request->file('picture')->move('news',$fileName);
	    	News::insert([
	    		'title_en' => $input['title_en'], 
	    		'title_de' => $input['title_de'],
	    		'description_en' => $input['description_en'],
	    		'description_de' => $input['description_de'],
	    		'content_en' => $input['content_en'],
	    		'content_de' => $input['content_de'],
	    		'slug' => Str::slug($input['title_en']),
	    		'slug_de' => Str::slug($input['title_de']),
	    		'picture' => $fileName,
	    	]);
    	}
    	return redirect()->back()->with('success','News created successfully');
    }

    public function editNews(){
        $news = News::paginate(12);
        return view('admin.edit-news')->with('news',$news);
    }

    public function editSingleNews($news_id){
        $news = News::find($news_id);
        return view('admin.edit-single-news')
            ->with('news',$news);
    }

    public function editSingleNewsPost(NewsRequest $request){
       $news_id = $request->news_id;
       $input =  $request->validated();
       News::where('id',$news_id)->update([
            'title_en' => $input['title_en'], 
            'title_de' => $input['title_de'],
            'description_en' => $input['description_en'],
            'description_de' => $input['description_de'],
            'content_en' => $input['content_en'],
            'content_de' => $input['content_de'],
            'slug' => Str::slug($input['title_en']),
            'slug_de' => Str::slug($input['title_de']),
       ]); 

       if($request->hasFile('picture')){
          $old_picture = News::find($news_id)->picture;
          $this->unlinkFile(base_path().'/public/news/'.$old_picture);
          $picture = $this->uploadFile($request->file('picture'),'/public/news');
          News::where('id',$news_id)->update(['picture' => $picture]);
       }

       return redirect()->back()->with('success','News edited successfully');
       
    }

    public function deleteSingleNews($news_id){
        $picture = News::find($news_id)->picture;
        $this->unlinkFile(base_path().'/public/news/'.$picture);
        News::find($news_id)->delete();
        return redirect()->route('edit-news')->with('success','News deleted successfully');
    }
}
