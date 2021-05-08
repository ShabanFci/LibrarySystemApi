<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Borrow::all());
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

          'date_issued' =>'required',
          'date_due_for_return' =>'required',
          'book_id' =>'required|exists:books,id',
          'user_id' =>'required|exists:users,id',

        ]);
        $borrow = new Borrow;
        $borrow->date_issued         = $input['date_issued'];
        $borrow->date_due_for_return = $input['date_due_for_return'];
        $borrow->book_id             = $input['book_id'];
        $borrow->user_id             = $input['user_id'];
        $borrow->save();
        return response()->json($borrow);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return response()->json(Borrow::whereId($borrow->id)->with('book','user')->first());
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
    public function update(Request $request, Borrow $borrow)
    {
        $input  = $request->validate([

          'date_issued' =>'required',
          'date_due_for_return' =>'required',
          'book_id' =>'required|exists:books,id',
          'user_id' =>'required|exists:users,id',

        ]);
        $borrow->date_issued         = $input['date_issued'];
        $borrow->date_due_for_return = $input['date_due_for_return'];
        $borrow->book_id             = $input['book_id'];
        $borrow->user_id             = $input['user_id'];
        $borrow->save();
        return response()->json($borrow);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        return response()->json($borrow->delete());
    }
}
