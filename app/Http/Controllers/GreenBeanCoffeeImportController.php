<?php

namespace App\Http\Controllers;

use App\GreenBeanCoffeeImport;
use Illuminate\Http\Request;

class GreenBeanCoffeeImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.green_bean_coffee_import_index', ['greenBeanCoffeeImports' => GreenBeanCoffeeImport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.green_bean_coffee_import_create', [
            'suppliers' => SupplierController::SupplierActive(),
            // 'units' => UnitController::UnitActive(),
            'greenBeanCoffeeTypes' => GreenBeanCoffeeTypeController::GreenBeanCoffeeTypeActive()
        ]);
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
            $greenBeanCoffeeImport = new GreenBeanCoffeeImport();
            $greenBeanCoffeeImport->supplier_id = $request->supplier_id;
            $greenBeanCoffeeImport->date_create = $request->date_create;
            $greenBeanCoffeeImport->total = $request->total;
            $greenBeanCoffeeImport->payment = $request->payment;
            $greenBeanCoffeeImport->due = $request->due;
            $greenBeanCoffeeImport->status = $request->status ?? 2;
            $greenBeanCoffeeImport->save();

            GreenBeanCoffeeImportDetailController::store($greenBeanCoffeeImportId, $request);

            return redirect()->route('admin.green_bean_coffee_import.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GreenBeanCoffeeImport  $greenBeanCoffeeImport
     * @return \Illuminate\Http\Response
     */
    public function show(GreenBeanCoffeeImport $greenBeanCoffeeImport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GreenBeanCoffeeImport  $greenBeanCoffeeImport
     * @return \Illuminate\Http\Response
     */
    public function edit($id, GreenBeanCoffeeImport $greenBeanCoffeeImport)
    {
        return view('backend.green_bean_coffee_import_edit', [
            'greenBeanCoffeeImport' => GreenBeanCoffeeImport::findOrFail($id),
            'suppliers' => Supplier::SupplierActive(),
            'units' => UnitController::UnitActive(),
            'greenBeanCoffeeTypes' => GreenCoffeeBeanType::GreenCoffeeBeanTypeActive()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GreenBeanCoffeeImport  $greenBeanCoffeeImport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GreenBeanCoffeeImport $greenBeanCoffeeImport)
    {
        $greenBeanCoffeeImport = GreenBeanCoffeeImport::findOrFail($request->greenBeanCoffeeImportId);
        try {
            $greenBeanCoffeeImport->supplier_id = $request->supplier_id;
            $greenBeanCoffeeImport->date_create = $request->date_create;
            $greenBeanCoffeeImport->total = $request->total;
            $greenBeanCoffeeImport->payment = $request->payment;
            $greenBeanCoffeeImport->due = $request->due;
            $greenBeanCoffeeImport->status = $request->status ?? 2;
            $greenBeanCoffeeImport->save();

            GreenBeanCoffeeImportDetailController::update($greenBeanCoffeeImportId, $request);

            return redirect()->route('admin.green_bean_coffee_import.index')->with(['type_alert'=>'success', 'message_alert'=>"Store is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GreenBeanCoffeeImport  $greenBeanCoffeeImport
     * @return \Illuminate\Http\Response
     */
    public function destroy($greenBeanCoffeeImportId, GreenBeanCoffeeImport $greenBeanCoffeeImport)
    {
        try {
            GreenBeanCoffeeImportDetailController::destroy($greenBeanCoffeeImportId);
            GreenBeanCoffeeImportController::destroy($greenBeanCoffeeImportId);
            return redirect()->route('admin.green_bean_coffee_import.index')->with(['type_alert'=>'success', 'message_alert'=>"Delete is success!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with(['type_alert'=>'danger', 'message_alert'=> $th->getMessage()]);
        }
    }
}
