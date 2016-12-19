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
           
        $category = $request->input('category');
        if (isset($category)){
            /*
                if the user has manually selected a category
                get those specific pics for display
            */
            $catalog_pics = Pic::where('category', $category)->get();
        }
        else {
            $category='Click Pic to Customize';
            /*without user select, default is all the pics */
            $catalog_pics = Pic::All();
        }
        if (Auth::user()) {
            $user = Auth::user();
            /* $user->pics() is the specific user's own wishlist of pics
               get these to display in wishlist window (button on main page,
               parg of the default view on create and edit pages)
            */
            $pics = $user->pics()->get();
            /* $data will be passed on to the vieww*/
            $data = array('name'=>$user->first_name, 'catalog_pics'=>$catalog_pics, 'pics'=>$pics, 'category'=>$category);
        }
        else {
            //post-class enhancements of this app will present pics and limited browsing to non-logged-in guests //
            $data = array('category'=>$category, 'catalog_pics'=>$catalog_pics);
        }
        return View::make('picnook.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($key)
    {
        //my create view is a combination of show and create, which seemed
        //to work best for flow of the app.  when user clicks on image on index page, is sent to a larger display of the specific image, with a form
        //having config options for frame and mat color, frame and mat length
        //in the context of the app, to create is to select a stock image and
        //add frame, mat, width for each, color for each

        //$pic is the specific pic to configure
        $pic= Pic::where('id', '=', $key)->first();
        
        //I have both first_name field and name (to satisfy assignment seeding requirements) fields.  I am treating those 2 fields equivalently.  new users register with first name and last name, not name
        if (Auth::user()) {
            $name = Auth::user()->first_name;

        $user=Auth::user();
        //$user's pics go to the wishlist display
        $pics = $user->pics()->get();
        }
        else {
            $name = '';
            $list = '';
        }
        $data = array('pic'=>$pic, 'name'=>$name, 'pics'=>$pics, 'key'=>$key);
        return View::make('picnook.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['key'=> 'required|numeric', 'frameselect' => 'required', 'framethick' => 'required|numeric', 'matselect' => 'required', 'matthick' =>'required|numeric', 'cost'=>'required|numeric']);

        //the value of the image id that will be stored
        $toAdd = $request->input('key');
        $user=Auth::user();
        $userid=$user->id;
        $list = $user->pics()->get();
        $itemtoAdd='';
        if (isset($list)){
        foreach ($list as $item) {
            if ($item->id == $toAdd) {
                Session::flash('flash_message', 'The Pic is already in your list');
               return \Redirect::back();
            }}
            $itemtoAdd = Pic::where('id', 'LIKE', $toAdd)->first();
            $frame_color = $request->input('frameselect');
            $frame_thickness = $request->input('framethick');
            if ($request->input('matselect')==null){
                $mat_color = '';
            }
            else $mat_color = $request->input('matselect');
            $cost = $request->input('cost');
            $mat_thickness = $request->input('matthick');
            $user->pics()->save($itemtoAdd);
            $match = ['pic_id' => $toAdd, 'user_id' => $userid];

            //gather the picture image traits to save.  note that cost is here for the purpose of future enhancements, but is a hardcoded default amount at this time
            $data = array('frame_color' => $frame_color, 'mat_color'=>$mat_color, 'frame_thickness'=>$frame_thickness, 'mat_thickness'=>$mat_thickness, 'cost'=>$cost);
            DB::table('pic_user')->where($match)->update($data);
            Session::flash('flash_message', 'your selection has been added.');
            return redirect('/pics/create/'.$toAdd);
    }}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //I don't have a typical show functionality.  
        //I'm taking users directly to a configuration screen for a particular pic when the click on a pic on the index page.  There they create, which then goes to store.
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

        $pics=$user->pics()->get();
        $match = ['pic_id' => $id, 'user_id' => $user->id];
        $pic_info = Pic::where('id', '=', $id)->first();
        //$pic_config is used to reference user's frame/mat config of frame and mat which are stored in pivot table fields for ease of use, as these are particular to this user's ownership of this instance of the pic.  p
        //pic_info references the Pics table, in which are stored the link, title, category
        //find the row in the table with this user and this pic id,to prepare the initial state and identifying variables necessary for editing and then updating
        $pic_config = DB::table('pic_user')->where($match)->first(); 
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
           $this->validate($request, [
        'matselect' => 'required', 'eframeselect' =>'required', 'eframethick'=>'required', 'ematthick'=>'required','cost'=>'required',
    ]);
        $id= $id;
        $user = Auth::user();
        $match = array('pic_id'=>$id, 'user_id'=>$user->id);
        //get the row from the pivot table where the configs are stored
        $pic= DB::table('pic_user')->WHERE($match);
        $mat_color = $request->matselect;
        $frame_color = $request->eframeselect;
        $frame_thickness = $request->eframethick;
        $mat_thickness = $request->ematthick;
        $cost = $request->cost;
        $data = array('mat_color'=>$mat_color, 'frame_color'=>$frame_color, 'frame_thickness'=>$frame_thickness, 'mat_thickness' => $mat_thickness, 'cost'=>$cost);
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
        $match = ['pic_id' => $id, 'user_id' => $user->id];
        DB::table('pic_user')->where($match)->delete(); 
        Session::flash('flash_message', 'your item was deleted');
        return \Redirect::back();
    }

    /* a simple search demo b the material in lecture, works on title and category of pics */
    /*the search function, search.js, and the search form are  Susan Buck's code (Susan Buck, Harvard University, not mine.  /*
    /*All other code by Myself */
    public function postSearch(Request $request) {
        #take only the first few characters for the search match, instead of the complete user term
        $fuzzy_string  = substr($request->searchTerm, 0, 3);
        $pics = Pic::where('category','LIKE','%'.$fuzzy_string.'%', 'OR')->
        where('title','LIKE','%'.$fuzzy_string.'%','OR')->get();
        return view('picnook.search-ajax')->with('pics',$pics);
    }
}
