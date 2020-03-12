<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.supplier_index', ['suppliers' => Supplier::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier_create');
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
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->surrogate = $request->surrogate;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->note = $request->note;
            $supplier->save();
            return redirect()->route('admin.supplier.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Supplier $supplier)
    {
        return view('backend.supplier_edit', ['supplier' => Supplier::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        try {
            $supplier = Supplier::findOrFail($request->id);
            $supplier->name = $request->name;
            $supplier->surrogate = $request->surrogate;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->note = $request->note;
            $supplier->save();
            return redirect()->route('admin.supplier.index')->with(['type_alert'=>'success', 'message_alert'=>"Update is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Supplier $supplier)
    {
        try {
            Supplier::destroy($id);
            return redirect()->route('admin.supplier.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    public static function SupplierActive()
    {
        return Supplier::all();
    }
}
