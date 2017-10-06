<?php

namespace App\Http\Controllers;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos = Video::orderBy('id','DESC')->paginate(5);

        return view('Video.index',compact('videos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'video_title' => 'required',

            'video_url' => 'required',

        ]);


        Video::create($request->all());

        session()->flash('message','Video created successfully');

        return redirect()->route('video.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $video = Video::FindBySlug($slug)->firstOrFail();


       return view('Video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $video = Video::FindBySlug($slug)->firstOrFail();

        return view('Video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
       $this->validate($request, [

            'video_title' => 'required',

            'video_url' => 'required',

        ]);


        Video::FindBySlug($slug)->update([

            'video_title' => request('video_title'),
            'video_url' =>request('video_url')

        ]);


        session()->flash('message','Video updated successfully');

        return redirect()->route('video.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Video::FindBySlug($slug)->delete();


            session()->flash('message','Video deleted successfully');

        return redirect()->route('video.index');
    }
}

