<?php

namespace Picnook\Http\Controllers;

use Illuminate\Http\Request;

//use Picnook;
use Picnook\Pic;
use Picnook\User;
use View, Auth, Redirect, DB, Config;
use Session;
//use Auth;
//use Picnook\View;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {   
        //dd($request->input($category));
        
        $test = $request->input('category');
        if (isset($test)){
           $category = $test;
        }

        
       /* $directory = public_path();

        $files = \File::allFiles($directory);
        foreach($files as $file)
            {echo(string)$file->getfileName(),"\n";}*/
        if (isset($category)){
             
         $catalog_pics = Pic::where('category', $category)->get();
        // dd($category);
     }
     else {
        $category='Click Pic to Customize';
        $catalog_pics = Pic::All();
}
            if (Auth::user()) {
            $user = Auth::user();
            $pics = $user->pics()->get();
            
             


        $data = array('name'=>$user->first_name, 'catalog_pics'=>$catalog_pics, 'pics'=>$pics, 'category'=>$category);
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
        $pics = $user->pics()->get();
        }
        else {
            $name = '';
            $list = '';
        }
        
        
        //$data= $pic;
        //dd($pic->link);
        //dd($request->key);
        //$data=$request->
        //public function pics() {
        //return $this->belongsToMany('Picnook\Pic', 'pic_user')->withTimestamps()->withPivot('mat_color', 'mat_thickness', 'frame_color', 'frame_thickness');



        return View::make('picnook.create')->with('pic', $pic)->with('name', $name)->with('pics', $pics)->with('key', $key);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //$toAdd = $request->input('key');

        //dd($toAdd);
        //$itemtoAdd='';
         //$itemtoAdd = Pic::where('id', 'LIKE', $toAdd)->first();
//itemtoAdd2 = $request->input('framethick');
         //dd($itemtoAdd2);
          $this->validate($request, [/*'title'=> 'required|min:3', 'published' => 'required|min:4|numeric', 'cover' => 'required|url', 'purchase_link' => 'required|url', */]);

         $toAdd = $request->input('key');
        //dd($toAdd);
        $user=Auth::user();
        $userid=$user->id;
        //dd($user);
        $list = $user->pics()->get();
        //dd($list);
        
        //dd($list);
        $itemtoAdd='';
        //dd($list);
        if (isset($list)){
        foreach ($list as $item) {
           
            //$toAdd = $toAdd+1;
            if ($item->id == $toAdd) {
               // if(!(\Auth::check())) {
                Session::flash('flash_message', 'You have already added this one');
               return \Redirect::back();//->with('status',
                //redirect('/')->with('flash_message');
            }}
            //else {
                 $itemtoAdd = Pic::where('id', 'LIKE', $toAdd)->first();
                 //dd($itemtoAdd);

                 $frame_color = $request->input('frameselect');
                 $frame_thickness = $request->input('framethick');
                 if ($request->input('matselect')==null){
                    $mat_color = '';
                 }
                 else $mat_color = $request->input('matselect');
                 $cost = $request->input('cost');
                 $mat_thickness = $request->input('matthick');
                 /* $a = $request->input('frameselect');
                 $b = $request->input('framethick');
                 $c= $request->input('matselect');
                 $d= $request->input('matthick');*/
                //if (!$list->contains($itemtoAdd->id)) 
                //{
                    $user->pics()->save($itemtoAdd);
                    //$wheretoAdd =DB::table('pic_user')->where('pic_id', 'LIKE', $toAdd)->first();
                    //DB::table('pic_user')->insert([
                   //$wheretoAdd->update(['frame_color'=>$itemtoAdd->frame_color]);
                    //dd($toAdd);
                    //dd($frame_color);
                    $matchThese = ['pic_id' => $toAdd, 'user_id' => $userid];
                   DB::table('pic_user')->where($matchThese)->update(['frame_color' => $frame_color, 'mat_color'=>$mat_color, 'frame_thickness'=>$frame_thickness, 'mat_thickness'=>$mat_thickness, 'cost'=>$cost]);
                   //DB::table('pic_user')->save();
                   //DB::table('users')
            //->where('id', 1)
            //->update(['votes' => 1]);
                return redirect('/pics/create/'.$toAdd);
                
                //'link'=>'/images/pexels-photo-65035.jpeg'
                    //dd($itemtoAdd->mat_thickness);
                    
                
            
      }}
    
    
        

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
        $user = Auth::user();
        //dd($user->pics()->get());
        //dd($user);
        
         $pics=$user->pics()->get();
         $matchThese = ['pic_id' => $id, 'user_id' => $user->id];

         $pic_info = Pic::where('id', '=', $id)->first();
         $pic_config = DB::table('pic_user')->where($matchThese)->first(); 
         //dd($pic_config->mat_color);
            //dd($pic);
          $data = array('pic_config'=>$pic_config,'pics'=>$pics, 'pic_info'=>$pic_info,'id'=>$id );
         return view('picnook.edit')->with($data);
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
     //dd($request->input('cost'));
       /* "eframeselect" => "#645452"
  "matselect" => "white"
  "eframethick" => "1"
  "ematthick" => "0.5"
  "cost" => "155.00"*/
       
        $id= $id;
        //dd($id);
        $user = Auth::user();
       
        $match = array('pic_id'=>$id, 'user_id'=>$user->id);
        $table = DB::table('pic_user');
        $pic= DB::table('pic_user')->WHERE($match);
       // dd($pic);

        //dd($pic->mat_color);
        //dd($pic);

       

        $mat_color = $request->matselect;
        $frame_color = $request->eframeselect;
        $frame_thickness = $request->eframethick;
        $cost = $request->cost;
        $data = array('mat_color'=>$mat_color, 'frame_color'=>$frame_color, 'frame_thickness'=>$frame_thickness, 'cost'=>$cost);
      
        $pic->update($data);
        Session::flash('flash_message', 'your changes were saved');
      
        return Redirect::Back();
      
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {  
        $user= Auth::user();
       // $pic=$user->pics()->find($id);
       // $pic=Pic::find($id);
      /*  if(is_null($id)) {
            Session:flash('message', 'pic not found');
            return redirect('/');
        }*/

        /*if($->tags()){
            $book->tags()->detach();
        }*/
        $matchThese = ['pic_id' => $id, 'user_id' => $user->id];
       
                   DB::table('pic_user')->where($matchThese)->delete(); 
        //$pic->delete();
        #DB::table('users')->delete();

        #DB::table('users')->where('votes', '>', 100)->delete();
        Session::flash('flash_message', 'your item was deleted');
        return \Redirect::back();

    }

    public function postSearch(Request $request) {

    # Do the search with the provided search term
   // $pics = Pic::where('title','LIKE','%'.$request->searchTerm.'%')->where('category', '=', $request->searchTerm)->get();

        $test  = substr($request->searchTerm, 0, 3);

    $pics = Pic::where('category','LIKE','%'.$test.'%', 'OR')->
    where('title','LIKE','%'.$test.'%','OR')->get();
   
     
    # Return the view with the books
    return view('picnook.search-ajax')->with('pics',$pics);
}

}
