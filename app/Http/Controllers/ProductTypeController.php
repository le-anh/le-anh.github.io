<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product_type_index',['productTypes' => ProductType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product_type_create');
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
                $path = Storage::putFile('uploads/products', $request->file('photo'));
                $productType = new ProductType();
                $productType->image_link = $path;
                $productType->name = $request->name;
                $productType->ingredient = $request->ingredient;
                $productType->use_manual = $request->use_manual;
                $productType->use_periord = $request->use_periord;
                $productType->description = $request->description;
                $productType->show = $request->show ? 1 : 0;
                $productType->save();
                return redirect()->route('admin.product_type.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
            }
        }
        return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> 'Please, select photo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ProductType $productType)
    {
        return view('backend.product_type_edit',['productType' => ProductType::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $productType = ProductType::findOrFail($request->id);

        try {
            if ($request->hasFile('photo')){
                Storage::exists($productType->image_link) ? Storage::delete($productType->image_link) : '';
                $path = Storage::putFile('uploads/products', $request->file('photo'));
                $productType->image_link = $path;
            }
            $productType->name = $request->name;
            $productType->ingredient = $request->ingredient;
            $productType->use_manual = $request->use_manual;
            $productType->use_periord = $request->use_periord;
            $productType->description = $request->description;
            $productType->show = $request->show ? 1 : 0;
            $productType->save();
            return redirect()->route('admin.product_type.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ProductType $productType)
    {
        try {
            ProductType::destroy($id);
            return redirect()->route('admin.product_type.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function ProductTypeShow()
    {
        return ProductType::where('show', '=', 1)->get();
    }
}
