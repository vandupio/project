<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feed;
use App\images;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('pages.about');
    }
    public function others()
    {

        $menus=feed::all();
        return view('pages.others',compact('menus'));
    }
    public function index()
    {
        //
         $thisfeedslist=feed::orderByRaw("RAND()")
         ->join('images', 'images.feedid', '=', 'feeds.id')
         ->limit(3)->get();
       // $thisfeedslist=feed::where('id' ,'>' ,0)->pluck('title','article');
       // echo "<pre>".print_r($thisfeedslist,1)."</pre>";
       /* for ($i=0; $i < 2; $i++) { 
            $ranId=array_rand($thisfeedslist);
            $random[$i]= feed::where($ranId,'>',0)->pluck('title','article');
        }*/
        $lastpost=feed::orderBy('created_at', 'desc')
                ->first();
        $limages=images::find($lastpost->id);
    
        return view('pages.index',compact('thisfeedslist','limages','lastpost'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *///title`, `article`, `picid`, `catid`, `created_at`, `updated_at
    public function show($id)
    {
        $foodx=feed::find($id);//
        $pic=images::find($foodx->picid);
        //echo $pic->Imagefilename;
        //

        return view('pages.menu',compact('foodx','pic'));
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
