<?php

namespace App\Http\Controllers;

use App\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.slide_show_index',['slideShows' => SlideShow::orderBy('order', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide_show_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if ($request->hasFile('photo')) {
            try {
                // $path = $request->file('photo')->store('uploads/slideshows');
                $path = Storage::putFile('uploads/slideshows', $request->file('photo'));
                $slideShow = new SlideShow();
                $slideShow->image_link = $path;
                // $slideShow->image_link = $path ? 'storage/app/' . $path : '';
                $slideShow->title = $request->title;
                $slideShow->text = $request->content;
                $slideShow->order = $request->order;
                $slideShow->show = $request->show ? 1 : 0;
                $slideShow->save();
                return redirect()->route('admin.slide_show.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
            }
        }
        return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> 'Please, select photo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function show(SlideShow $slideShow)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function edit($id, SlideShow $slideShow)
    {
        return view('backend.slide_show_edit',['slideShow' => SlideShow::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlideShow $slideShow)
    {
        $slideShow = SlideShow::findOrFail($request->id);
        
        try {
            if ($request->hasFile('photo')){
                Storage::exists($slideShow->image_link) ? Storage::delete($slideShow->image_link) : '';
                $path = Storage::putFile('uploads/slideshows', $request->file('photo'));
                $slideShow->image_link = $path;
            }

            $slideShow->title = $request->title;
            $slideShow->text = $request->content;
            $slideShow->order = $request->order;
            $slideShow->show = $request->show ? 1 : 0;
            $slideShow->save();
            return redirect()->route('admin.slide_show.index')->with(['type_alert'=>'success', 'message_alert'=>"Update is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, SlideShow $slideShow)
    {
        try {
            SlideShow::destroy($id);
            return redirect()->route('admin.slide_show.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function SlideShowActive()
    {
        return SlideShow::where('show', '=', 1)->get();
    }
}
