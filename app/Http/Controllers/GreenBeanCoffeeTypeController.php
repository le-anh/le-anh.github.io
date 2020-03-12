<?php

namespace App\Http\Controllers;

use App\GreenBeanCoffeeType;
use Illuminate\Http\Request;

class GreenBeanCoffeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.green_bean_coffee_type_index', ['greenBeanCoffeeTypes' => GreenBeanCoffeeType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.green_bean_coffee_type_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $greenBeanCoffeeType = new GreenBeanCoffeeType();
            $greenBeanCoffeeType->name = $request->name;
            $greenBeanCoffeeType->description = $request->description;
            $greenBeanCoffeeType->note = $request->note;
            $greenBeanCoffeeType->save();
            return redirect()->route('admin.green_bean_coffee_type.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GreenBeanCoffeeType  $greenBeanCoffeeType
     * @return \Illuminate\Http\Response
     */
    public function show(GreenBeanCoffeeType $greenBeanCoffeeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GreenBeanCoffeeType  $greenBeanCoffeeType
     * @return \Illuminate\Http\Response
     */
    public function edit($id, GreenBeanCoffeeType $greenBeanCoffeeType)
    {
        return view('backend.green_bean_coffee_type_edit', ['greenBeanCoffeeType' => GreenBeanCoffeeType::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GreenBeanCoffeeType  $greenBeanCoffeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GreenBeanCoffeeType $greenBeanCoffeeType)
    {
        try {
            $greenBeanCoffeeType = GreenBeanCoffeeType::findOrFail($request->id);
            $greenBeanCoffeeType->name = $request->name;
            $greenBeanCoffeeType->description = $request->description;
            $greenBeanCoffeeType->note = $request->note;
            $greenBeanCoffeeType->save();
            return redirect()->route('admin.green_bean_coffee_type.index')->with(['type_alert'=>'success', 'message_alert'=>"Update is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GreenBeanCoffeeType  $greenBeanCoffeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, GreenBeanCoffeeType $greenBeanCoffeeType)
    {
        try {
            GreenBeanCoffeeType::destroy($id);
            return redirect()->route('admin.green_bean_coffee_type.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function GreenBeanCoffeeTypeActive()
    {
        return GreenBeanCoffeeType::all();
    }
}
