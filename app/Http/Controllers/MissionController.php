<?php

namespace App\Http\Controllers;

use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.mission_index',['missions' => Mission::orderBy('order', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mission_create');
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
                $path = Storage::putFile('uploads/missions', $request->file('photo'));
                $mission = new Mission();
                $mission->image_link = $path;
                $mission->title = $request->title;
                $mission->text = $request->content;
                $mission->order = $request->order;
                $mission->show = $request->show ? 1 : 0;
                $mission->save();
                return redirect()->route('admin.mission.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
            }
        }
        return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> 'Please, select photo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.mission_edit',['mission' => Mission::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $mission = Mission::findOrFail($request->id);
        
        try {
            if ($request->hasFile('photo')){
                Storage::exists($mission->image_link) ? Storage::delete($mission->image_link) : '';
                $path = Storage::putFile('uploads/missions', $request->file('photo'));
                $mission->image_link = $path;
            }

            $mission->title = $request->title;
            $mission->text = $request->content;
            $mission->order = $request->order;
            $mission->show = $request->show ? 1 : 0;
            $mission->save();
            return redirect()->route('admin.mission.index')->with(['type_alert'=>'success', 'message_alert'=>"Update is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Mission $mission)
    {
        try {
            Mission::destroy($id);
            return redirect()->route('admin.mission.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function MissionActive()
    {
        return Mission::where('show', '=', 1)->get();
    }
}
