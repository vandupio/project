<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;
use App\feed;
use App\images;
class FeedController extends Controller
{
    public function list()
    {
        return view('pages.feedlist');
    }
    public function preview()
    {
        return view('pages.menuadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats=DB::table('category')->get();
       
        return view('pages.feed',compact('cats'));
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
        $newfeed= new feed;
        $newimage= new images;

         if(is_null($request->ascat))
            { 
                $this->validate($request, [
                    'title' => 'required',
                    'category' => 'required',
                    'editor' => 'required',
                    'primeimage' => 'image|nullable|max:1999'
                ]);
                 $newfeed->title=$request->title;
                $newfeed->catid=$request->category;
                $newfeed->article=$request->editor;
                $newfeed->save();
                $feedxID=$newfeed->id;
            }else
            {
                $this->validate($request, [
                    'title' => 'required',
                    'ascat' => 'required',
                    'editor' => 'required',
                    'primeimage' => 'image|nullable|max:1999'
                ]);
                
                $inseArray = array(
                    'categoryName'=> $request->ascat,
                    'catDiscription'=> ""
                );
                DB::table('category')->insert($inseArray);
                $catIDx=DB::table('category')->get()->last()->id;
                $newfeed->title=$request->title;
                $newfeed->catid=$catIDx;
                $newfeed->article=$request->editor;
                $newfeed->save();
                $feedxID=$newfeed->id;
            }
        
        
        if($request->hasFile('primeimage')){
            // Get filename with the extension
            $filenameWithExt = $request->file('primeimage')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('primeimage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $request->file('primeimage')->storeAs('public/storage', $fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
            
            $newimage->Imagefilename=$fileNameToStore;
            $newimage->state= "primary";
            $newimage->feedid=$feedxID;
            $newimage->save();
            $imageidx=$newimage->id;//get posted image id

        DB::table('feeds')->where('id',$feedxID)->update(array('picid'=>$imageidx));
        return redirect()->to('feedlist');
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
        $thisfeedslist=feed::where('id',$id)->get();

        foreach ($thisfeedslist as $list) {
            $images=images::where('id',$list->picid)->get();
           
         } 
         $cats=DB::table('category')->get();
        //echo "<pre>".print_r($cats,1)."</pre>";
         return view('pages.feededit',compact('thisfeedslist','images','cats'));
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
            echo "edit";

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
        //echo $request->title. ' / '.$id;
        $imageid=feed::where('id',$id)->get('picid');
        $feedupdate = feed::find($id);
        $imageupdate= images::find($imageid);
        if(is_null($request->ascat))
            { 
                $this->validate($request, [
                    'title' => 'required',
                    'category' => 'required',                  
                    'editor' => 'required'
                ]);
                $feedupdate->title=$request->title;
                $feedupdate->catid=$request->category;
                $feedupdate->article=$request->editor;
                $feedupdate->save();
            }else
            {
                $this->validate($request, [
                    'title' => 'required',
                    'editor' => 'required',
                    'ascat' => 'required'
                ]);
                $inseArray = array(
                    'categoryName'=> $request->ascat,
                    'catDiscription'=> ""
                );
                DB::table('category')->insert($inseArray);
                $catIDx=DB::table('category')->get()->last()->id;
                $feedupdate->title=$request->title;
                $feedupdate->catid=$catIDx;
                $feedupdate->article=$request->editor;
                $feedupdate->save();

            }
       
     
        if($request->hasFile('primeimage')){
            // Get filename with the extension
            $filenameWithExt = $request->file('primeimage')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('primeimage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $request->file('primeimage')->storeAs('public/storage', $fileNameToStore);
            $imageupdate->Imagefilename=$fileNameToStore;
            $imageupdate->state= "primary";
            $imageupdate->feedid=$feedxID;
            $imageupdate->save();
            $imageidx=$imageupdate->id;//get posted image id
        }
         return redirect()->to('feedlist');
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
        $post = feed::find($id);
        $post->delete();
        return redirect()->to('feedlist')->with('success', 'Post Removed');
    }
}
