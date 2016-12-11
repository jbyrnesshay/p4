<?php

namespace Picnook\Http\Controllers;

use Illuminate\Http\Request;

//use Picnook;
use Picnook\Pic;
use Picnook\User;
use View, Auth;
//use Auth;
//use Picnook\View;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function getFiles() {
        $files = [];
       $directory = public_path();
       // $files = \File::allFiles($directory);
        $files = glob('$directory\images\*.jpeg');
        
        //foreach($files as $file){
             
            //$pics[]=$file->getPathname().'\\'.$file->getFilename();
        //}
        dd($files);
    }*/
    public function index(Request $request)
    {   

       /* $directory = public_path();

        $files = \File::allFiles($directory);
        foreach($files as $file)
            {echo(string)$file->getfileName(),"\n";}
         */$pics = Pic::all();

            if (Auth::user()) {
            $user = Auth::user();

        $data = array('name'=>$user->first_name, 'pics'=>$pics);
    }

    else {
        $data = ['pics'=>$pics];
    }
         
         //dd($user->first_name);
         //dd($pics);
        return View::make('picnook.index')->with($data);

       // (['pics'=>$pics], ['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($key)
    {

        //dd($key);
        $pic= Pic::where('id', '=', $key)->first();
        if (Auth::user()) {
            $name = Auth::user()->first_name;
        }
        else $name = '';

        //$data= $pic;
        //dd($pic->link);
        //dd($request->key);
        //$data=$request->
        return View::make('picnook.create')->with('pic', $pic)->with('name', $name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
