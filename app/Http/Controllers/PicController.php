<?php

namespace Picnook\Http\Controllers;

use Illuminate\Http\Request;

//use Picnook;
use Picnook\Pic;
use Picnook\User;
use View, Auth, Session, Redirect, DB, Config;
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
         $toAdd = $request->input('key');

        //dd($toAdd);
        $itemtoAdd='';
         //$itemtoAdd = Pic::where('id', 'LIKE', $toAdd)->first();
         $itemtoAdd2 = $request->input('framethick');
         //dd($itemtoAdd2);
          $this->validate($request, [/*'title'=> 'required|min:3', 'published' => 'required|min:4|numeric', 'cover' => 'required|url', 'purchase_link' => 'required|url', */]);

        $toAdd = $request->input('key');
        //dd($toAdd);
        $user=Auth::user();
        $userid=$user->id;
        //dd($user);
        $list = $user->pics()->get();
        
        //dd($list);
        foreach ($list as $item) {
            //$toAdd = $toAdd+1;
            if ($item->id == $toAdd) {
               // if(!(\Auth::check())) {
                Session::flash('flash_message', 'You have already added this one');
                return redirect('/create/'.$toAdd);
            }
            else {
                 $itemtoAdd = Pic::where('id', 'LIKE', $toAdd)->first();
                 //dd($itemtoAdd);

                 $frame_color = $request->input('frameselect');
                 $frame_thickness = $request->input('framethick');
                 if ($request->input('matselect')==null){
                    $mat_color = '';
                 }
                 else $mat_color = $request->input('matselect');
                 $mat_thickness = $request->input('matthick');
                 /* $a = $request->input('frameselect');
                 $b = $request->input('framethick');
                 $c= $request->input('matselect');
                 $d= $request->input('matthick');*/
                if (!$list->contains($itemtoAdd->id)) 
                {
                    $user->pics()->save($itemtoAdd);
                    //$wheretoAdd =DB::table('pic_user')->where('pic_id', 'LIKE', $toAdd)->first();
                    //DB::table('pic_user')->insert([
                   //$wheretoAdd->update(['frame_color'=>$itemtoAdd->frame_color]);
                    //dd($toAdd);
                    //dd($frame_color);
                    $matchThese = ['pic_id' => $toAdd, 'user_id' => $userid];
                   DB::table('pic_user')->where($matchThese)->update(['frame_color' => $frame_color, 'mat_color'=>$mat_color, 'frame_thickness'=>$frame_thickness, 'mat_thickness'=>$mat_thickness]);
                   //DB::table('pic_user')->save();
                   //DB::table('users')
            //->where('id', 1)
            //->update(['votes' => 1]);
            
                }
                //'link'=>'/images/pexels-photo-65035.jpeg'
                    //dd($itemtoAdd->mat_thickness);
                    return redirect('/');
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
