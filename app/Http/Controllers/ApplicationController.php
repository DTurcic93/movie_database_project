<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Movie;

class ApplicationController extends Controller
{
    public function showAll(){
        $req = Request::create('http://localhost:8000/api/movie', 'GET');
        $movies=array();        
        $movies = json_decode(Route::dispatch($req)->getContent());

       
       echo"<table class='table' style='margin: 0 auto; width:250px;'>";
        foreach ($movies as $m) { 
        echo"<tr>";
                echo"<td>{$m->title}</td>";                
                echo "<td><img src='../img/".$m->picture."' /></td>";                  
                echo"<td><a href='../details/{$m->id}'style='margin: 20px;'>Details</a></td>";                  
           echo"</tr>";
      }
        return view('showAll'); 
    }

   
     public function details($id){
        $req =  Request::create("http://localhost:8000/api/movie/$id", 'GET');
        $movies  = json_decode(Route::dispatch($req)->getContent());

        return view('movieDetails', ['movies'=>$movies[0]]);
    }
    

    public function delete($id){
        $req = Request::create("http://localhost:8000/api/movie/delete/$id", 'GET');
        $response = json_decode(Route::dispatch($req)->getContent());

        return $this->showAll();      
        
    }

    public function showInsertForm(){
        return view('insertform');
    }

    public function insert(Request $request){        
        $title=$request->input('title');
        $year=$request->input('year');
        $length=$request->input('length');
        $genre_id=$request->input('genre_id');
        $picture=$request->input('picture'); 

        if (strlen($title) ==0 || !is_numeric($year) || strlen($length) ==0 || strlen($genre_id) ==0 || strlen($picture) == 0 ) {
            echo "Sva polja moraju biti ispunjena!";
            return view('insertform');
          }
        

        DB::table('movies')->insert([
            'title'=>$title,
            'year'=>$year,
            'length'=>$length,
            'genre_id'=>$genre_id,
            'picture'=>$picture             
        ]);
        return $this->showAll();
    }

    public function update($id){
        $req = Request::create("http://localhost:8000/api/movie/$id", 'GET');
        $movies = json_decode(Route::dispatch($req)->getContent());

        return view('updated',['movies' => $movies[0]]);
    }

    public function updateDetails(Request $request){
        $id = $request->input('id');
        $title=$request->input('title');
        $year=$request->input('year');
        $length=$request->input('length');
        $genre_id=$request->input('genre_id');
        $picture=$request->input('picture'); 
        
        if (strlen($title) ==0 || !is_numeric($year) || strlen($length) ==0 || strlen($genre_id) ==0 || strlen($picture) == 0 ) {
            echo "Sva polja moraju biti ispunjena!";            
            return $this->update($id);
        }
        

        DB::table('movies')
        ->where('id', $id)
        ->update([
            'title'=>$title,
            'year'=>$year,
            'length'=>$length,
            'genre_id'=>$genre_id,
            'picture'=>$picture
            
        ]);
        return $this->showAll();
    }
}
