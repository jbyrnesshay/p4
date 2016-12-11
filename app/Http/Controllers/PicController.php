<?php

namespace Picnook\Http\Controllers;

use Illuminate\Http\Request;

//use Picnook;
use Picnook\Pic;
use Picnook\User;
use View, Auth, Session, Redirect;
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

      
        $pic= Pic::where('id', '=', $key)->first();
        if (Auth::user()) {
            $name = Auth::user()->first_name;
        
        $user=Auth::user();
        $list = $user->pics()->get();
        }
        else {
            $name = '';
            $list = '';
        }
        
        
        //$data= $pic;
        //dd($pic->link);
        //dd($request->key);
        //$data=$request->
        return View::make('picnook.create')->with('pic', $pic)->with('name', $name)->with('list', $list)->with('key', $key);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [/*'title'=> 'required|min:3', 'published' => 'required|min:4|numeric', 'cover' => 'required|url', 'purchase_link' => 'required|url', */]);

        $toAdd = $request->input('key');
        $user=Auth::user();
        $list = $user->pics()->get();
        $itemtoAdd='';
        //dd($list);
        foreach ($list as $item) {
            if ($item->id == $toAdd) {
               // if(!(\Auth::check())) {
                Session::flash('flash_message', 'You have already added this one');
                return redirect('/create/'.$toAdd);
            }
            else {
                 $itemtoAdd = Pic::where('id', 'LIKE', $toAdd)->first();
                 //dd($itemtoAdd);
                if (!$list->contains($itemtoAdd->id)) 
                {
                    $user->pics()->save($itemtoAdd);
                    return redirect('/');
                }
            }
      }
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
