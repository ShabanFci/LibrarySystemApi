<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input  = $request->validate([
            'isbn' => 'required|unique:books,isbn',
            'title' => 'required',
            'date_of_publication' => 'required',
            'category_id' => 'required|exists:categories,id',
            'auther_id' => 'required|exists:authers,id',
        ]);
        $book = new Book;
        $book->isbn = $input['isbn'];
        $book->title = $input['title'];
        $book->date_of_publication = $input['date_of_publication'];
        $book->category_id = $input['category_id'];
        $book->auther_id = $input['auther_id'];
        $book->save();
        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json(Book::whereId($book->id)->with('category','auther')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $input  = $request->validate([
            'isbn' => 'required|unique:books,isbn',
            'title' => 'required',
            'date_of_publication' => 'required',
            'category_id' => 'required|exists:categories,id',
            'auther_id' => 'required|exists:authers,id',
        ]);
        $book->isbn = $input['isbn'];
        $book->title = $input['title'];
        $book->date_of_publication = $input['date_of_publication'];
        $book->category_id = $input['category_id'];
        $book->auther_id = $input['auther_id'];
        $book->save();
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        return response()->json($book->delete());
    }
}
