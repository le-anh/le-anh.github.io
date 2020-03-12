<?php

namespace App\Http\Controllers;

use App\GreenBeanCoffeeImportDetail;
use Illuminate\Http\Request;

class GreenBeanCoffeeImportDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public static function store($greenBeanCoffeeImportId, Request $request)
    {
        foreach ($request->green_bean_coffee_type_id as $key => $greenBeanCoffeeType) {
            $greenBeanCoffeeImportDetail = new GreenBeanCoffeeImportDetail();
            $greenBeanCoffeeImportDetail->green_bean_coffee_import_id = $request->green_bean_coffee_import_id[$key];
            $greenBeanCoffeeImportDetail->green_bean_coffee_type_id = $request->green_bean_coffee_type_id[$key];
            $greenBeanCoffeeImportDetail->unit_id = $request->unit_id[$key];
            $greenBeanCoffeeImportDetail->price = $request->price[$key];
            $greenBeanCoffeeImportDetail->quantity = $request->quantity[$key];
            $greenBeanCoffeeImportDetail->total = $request->total[$key];
            $greenBeanCoffeeImportDetail->save();
        }
        return TRUE;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GreenBeanCoffeeImportDetail  $greenBeanCoffeeImportDetail
     * @return \Illuminate\Http\Response
     */
    public function show(GreenBeanCoffeeImportDetail $greenBeanCoffeeImportDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GreenBeanCoffeeImportDetail  $greenBeanCoffeeImportDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(GreenBeanCoffeeImportDetail $greenBeanCoffeeImportDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GreenBeanCoffeeImportDetail  $greenBeanCoffeeImportDetail
     * @return \Illuminate\Http\Response
     */
    public function update($greenBeanCoffeeImportId, Request $request, GreenBeanCoffeeImportDetail $greenBeanCoffeeImportDetail)
    {
        self::destroyByGreenBeanCoffeeImportId($greenBeanCoffeeImportId);
        
        foreach ($request->green_bean_coffee_type_id as $key => $greenBeanCoffeeType) {
            $greenBeanCoffeeImportDetail = new GreenBeanCoffeeImportDetail();
            $greenBeanCoffeeImportDetail->green_bean_coffee_import_id = $request->green_bean_coffee_import_id[$key];
            $greenBeanCoffeeImportDetail->green_bean_coffee_type_id = $request->green_bean_coffee_type_id[$key];
            $greenBeanCoffeeImportDetail->unit_id = $request->unit_id[$key];
            $greenBeanCoffeeImportDetail->price = $request->price[$key];
            $greenBeanCoffeeImportDetail->quantity = $request->quantity[$key];
            $greenBeanCoffeeImportDetail->total = $request->total[$key];
            $greenBeanCoffeeImportDetail->save();
        }
        return TRUE;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GreenBeanCoffeeImportDetail  $greenBeanCoffeeImportDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(GreenBeanCoffeeImportDetail $greenBeanCoffeeImportDetail)
    {
        //
    }

    public function destroyByGreenBeanCoffeeImportId($greenBeanCoffeeImportId)
    {
        GreenBeanCoffeeImportDetail::where('green_bean_coffee_import_id', '=', $greenBeanCoffeeImportId)->delete();
    }
}
