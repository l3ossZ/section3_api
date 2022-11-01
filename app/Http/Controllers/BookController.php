<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index(){
        $books=Book::get();
        return BookResource::collection($books);
    }

    public function store(Request $request){
        $book=new Book();
        $book->title=$request->get('title');
        $book->author_id=$request->get('author_id');
        $book->summary=$request->get('summary');
        $book->ibsn=$request->get('ibsn');
        $book->url=$request->get('url');
        if($book->save()){
            return response()->json([
                'status'=>'complete',
                'message'=>'Created Book complete with id : '.$book->id
            ],Response::HTTP_CREATED);
        }
        return response()->json([
            'status'=>'failed',
            'message'=>'Create Book Failed'
        ],Response::HTTP_BAD_REQUEST);
    }

    public function show(Book $book){
        return new BookResource($book);
    }

    public function update(Book $book,Request $request){
        if($request->has('title')) $book->title=$request->get('title');
        if($request->has('author_id')) $book->author_id=$request->get('author_id');
        if($request->has('summary')) $book->summary=$request->get('summary');
        if($request->has('ibsn')) $book->ibsn=$request->get('ibsn');
        if($request->has('url')) $book->url=$request->get('url');
        if($book->save()){
            return response()->json([
                'status'=>'complete',
                'message'=>'Updated Book complete with id : '.$book->id
            ],Response::HTTP_OK);
        }
        return response()->json([
            'status'=>'failed',
            'message'=>'Update Book Failed'
        ],Response::HTTP_BAD_REQUEST);
    }

    public function delete(Book $book){
        $temp=$book->id;
        if($book->delete()){
            return response()->json([
                'status'=>'complete',
                'message'=>'Book Id : '.$temp.' has been Delete'
            ],Response::HTTP_OK);
        }
        return response()->json([
            'status'=>'failed',
            'message'=>'Book delete failed'
        ],Response::HTTP_BAD_REQUEST);
    }
}
