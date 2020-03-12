<?php

namespace App\Http\Controllers;

use App\ImageActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.image_active_index',['gallerries' => ImageActive::orderBy('order', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.image_active_create');
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
                $path = Storage::putFile('uploads/imageActives', $request->file('photo'));
                $imageActive = new ImageActive();
                $imageActive->image_categories_id = $request->imageCategoriesId;
                $imageActive->image_link = $path;
                $imageActive->title = $request->title;
                $imageActive->description = $request->description;
                $imageActive->order = $request->order;
                $imageActive->show = $request->show ? 1 : 0;
                $imageActive->save();
                return redirect()->route('admin.gallerry.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
            }
        }
        return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> 'Please, select photo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageActive  $imageActive
     * @return \Illuminate\Http\Response
     */
    public function show(ImageActive $imageActive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageActive  $imageActive
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ImageActive $imageActive)
    {
        return view('backend.image_active_edit',['gallerry' => ImageActive::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageActive  $imageActive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageActive $imageActive)
    {
        $imageActive = ImageActive::findOrFail($request->id);
        
        try {
            if ($request->hasFile('photo')){
                Storage::exists($imageActive->image_link) ? Storage::delete($imageActive->image_link) : '';
                $path = Storage::putFile('uploads/imageActives', $request->file('photo'));
                $imageActive->image_link = $path;
            }

            $imageActive->image_categories_id = $request->imageCategoriesId;
            $imageActive->title = $request->title;
            $imageActive->description = $request->description;
            $imageActive->order = $request->order;
            $imageActive->show = $request->show ? 1 : 0;
            $imageActive->save();
            return redirect()->route('admin.gallerry.index')->with(['type_alert'=>'success', 'message_alert'=>"Update is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageActive  $imageActive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ImageActive $imageActive)
    {
        try {
            ImageActive::destroy($id);
            return redirect()->route('admin.gallerry.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function ImageActive()
    {
        return ImageActive::where('show', '=', 1)->get();
    }
}
