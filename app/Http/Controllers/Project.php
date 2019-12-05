<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Http\Providers\Auth;


class Project extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  //this makes one to be logged in to access any of project pages
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=Projects::where('user_id',auth()->user()->id)->get();
         return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('stored');
        $id=auth()->user()->id;
        $attr=$request->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
            
        ]);

        Projects::create( $attr+['user_id'=> auth()->user()->id] );
        // Projects::create( $request ,['user_id'=> auth()->user()->id]);
        //  dd(auth()->user()->id);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $userData=Projects::findOrFail($id);
        $userData = Projects::where('user_id',$id)->get();
        return view('show',compact('userData'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
