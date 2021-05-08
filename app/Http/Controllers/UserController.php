<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all());
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

          'name' =>'required|string|max:255',
          'email' =>'required|email|unique:users,email|max:255',
          'password' =>'required|min:6',
          'password_confirmation' =>'same:password',
        ]);
        $user = new User;
        if(trim($request->password) == ''){
           $input = $request->except('password');
        }else{
           $input['password'] = bcrypt($request->password);
           $user->password = $input['password'];
        }
        $user->name  = $input['name'];
        $user->email = $input['email'];
        
        $user->save();
        return response()->json($user);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
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
    public function update(Request $request, User $user)
    {
        $input  = $request->validate([

          'name' =>'required|string|max:255',
          'email' =>'required|email|unique:users,email|max:255'.$user->id,
          'password' =>'required|min:6',
          'password_confirmation' =>'same:password',
        ]);
        if(trim($request->password) == ''){
           $input = $request->except('password');
        }else{
           $input['password'] = bcrypt($request->password);
           $user->password = $input['password'];
        }
        $user->name  = $input['name'];
        $user->email = $input['email'];
        
        $user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return response()->json($user->delete());
    }
}

