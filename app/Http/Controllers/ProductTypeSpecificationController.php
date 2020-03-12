<?php

namespace App\Http\Controllers;

use App\ProductTypeSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductTypeSpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product_type_specification_index',['productTypeSpecifications' => ProductTypeSpecification::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product_type_specification_create', ['productTypes'=>ProductTypeController::ProductTypeShow()]);
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
                $productTypeSpecification = new ProductTypeSpecification();
                $productTypeSpecification->image_link = $path;
                $productTypeSpecification->product_type_id = $request->product_type_id;
                $productTypeSpecification->net_weight = $request->net_weight;
                $productTypeSpecification->description = $request->description;
                $productTypeSpecification->show = $request->show ? 1 : 0;
                $productTypeSpecification->save();
                return redirect()->route('admin.product_type_specification.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
            }
        }
        return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> 'Please, select photo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductTypeSpecification  $productTypeSpecification
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTypeSpecification $productTypeSpecification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductTypeSpecification  $productTypeSpecification
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ProductTypeSpecification $productTypeSpecification)
    {
        return view('backend.product_type_specification_edit',[
            'productTypeSpecification' => ProductTypeSpecification::findOrFail($id), 
            'productTypes'=>ProductTypeController::ProductTypeShow()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductTypeSpecification  $productTypeSpecification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTypeSpecification $productTypeSpecification)
    {
        $productTypeSpecification = ProductTypeSpecification::findOrFail($request->id);

        try {
            if ($request->hasFile('photo')){
                Storage::exists($productTypeSpecification->image_link) ? Storage::delete($productTypeSpecification->image_link) : '';
                $path = Storage::putFile('uploads/products', $request->file('photo'));
                $productTypeSpecification->image_link = $path;
            }
            $productTypeSpecification->product_type_id = $request->product_type_id;
            $productTypeSpecification->net_weight = $request->net_weight;
            $productTypeSpecification->description = $request->description;
            $productTypeSpecification->show = $request->show ? 1 : 0;
            $productTypeSpecification->save();
            return redirect()->route('admin.product_type_specification.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductTypeSpecification  $productTypeSpecification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ProductTypeSpecification $productTypeSpecification)
    {
        try {
            ProductTypeSpecification::destroy($id);
            return redirect()->route('admin.product_type_specification.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function ProductTypeSpecificationActive()
    {
        return ProductTypeSpecification::where('show', '=', 1)->get();
    }
}
