<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    public function index(){
        $authors=Author::get();
        return AuthorResource::collection($authors);

    }

    public function store(Request $request){
        $author=new Author();
        $author->first_name=$request->get('first_name');
        $author->family_name=$request->get('family_name');
        $author->date_of_birth=$request->get('date_of_birth');
        $author->date_of_death=$request->get('date_of_death');
        $author->name=$request->get('name');
        $author->lifespan=$request->get('lifespan');
        $author->url=$request->get('url');
        if($author->save()){
            return response()->json([
                'status'=>'complete',
                'message'=>'create author complete with id : '.$author->id
            ],Response::HTTP_CREATED);
        }
        return response()->json([
            'status'=>'failed',
            'message'=>'create author failed'
        ],Response::HTTP_BAD_REQUEST);
    }

    public function show(Author $author){
        $books=$author->books;
        return new AuthorResource($author);
    }
    public function update(Author $author,Request $request){
        if($request->has('first_name')) $author->first_name=$request->get('first_name');
        if($request->has('family_name')) $author->family_name=$request->get('family_name');
        if($request->has('date_of_birth')) $author->date_of_birth=$request->get('date_of_birth');
        if($request->has('date_of_death')) $author->date_of_death=$request->get('date_of_death');
        if($request->has('name')) $author->name=$request->get('name');
        if($request->has('lifespan')) $author->lifespan=$request->get('lifespan');
        if($request->has('url')) $author->url=$request->get('url');
        if($author->save()){
            return response()->json([
                'status'=>'complete',
                'message'=>'Updated author complete with id : '.$author->id
            ],Response::HTTP_OK);
        }
        return response()->json([
            'status'=>'failed',
            'message'=>'Updated author failed'
        ]);
    }

    public function delete(Author $author){
        $temp=$author->id;
        if($author->delete()){
            return response()->json([
                'status'=>'complete',
                'message'=>'Author id : '.$temp.'has been delete'
            ]);
        }
        return response()->json([
            'status'=>'failed',
            'message'=>'delete failed'
        ]);
    }
}
