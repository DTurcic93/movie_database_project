<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie;


class MovieController extends Controller
{
     public function getAll(){
        return Movie::all();
    }

    public function getDetails($id){
        return Movie::first()->where('id','=', $id)->get();
    }

    public function insert(Request $request){

        $title=$request->input('title');
        $year=$request->input('year');
        $length=$request->input('length');
        $genre_id=$request->input('genre_id');
        $picture=$request->input('pictures');        

        DB::table('movies')->insert([
            'title'=>$title,
            'year'=>$year,
            'length'=>$length,
            'genre_id'=>$genre_id,
            'picture'=>$picture            
        ]);
        return "true";
    }

    public function update(Request $request){
        $id=$request->input('id');
        $title=$request->input('title');
        $year=$request->input('year');
        $length=$request->input('length');
        $genre_id=$request->input('genre_id');
        $picture=$request->input('pictures');        

        DB::table('movies')
        ->where('id',$id)
        ->update([
            'title'=>$title,
            'year'=>$year,
            'length'=>$length,
            'genre_id'=>$genre_id,
            'picture'=>$picture             
        ]);
        return "true";
    }

    public function delete($id){
        DB::table('movies')->where('id', $id)->delete();
        return "true";
        return $this->index();

    }
}
