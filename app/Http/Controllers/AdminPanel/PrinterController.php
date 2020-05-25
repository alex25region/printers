<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\ModelPrinter;
use App\Models\Printer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printers = Printer::with('getModel')->orderBy('ipaddress')->get();
        //dd($printers);
        return view('admin.printers.index ', compact('printers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $printers = Printer::all();
        $models = ModelPrinter::all();
        return view ('admin.printers.create', compact('printers', 'models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file == null) {
            $requestData = $request->all();
            $requestData['file'] = null;

            Printer::create($requestData);
        }
        else {
            if ($request->hasFile('file')) {
                $a = $request->file->getClientOriginalExtension();

                // Формируем имя:
                $name = str_replace(' ', '_', $request->name) . ".$a";

                // Сохраняем файл:
                $request->file->storeAs('scripts', $name, 'public');

                $requestData = $request->all();
                $requestData['file'] = $name;

                Printer::create($requestData);
            }
        }


        //Printer::create($request->all());
        return redirect()->route('admin.printers.index')->with('success', 'Record created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$printers = Printer::all();
        $models = ModelPrinter::all();
        $printer = Printer::findOrFail($id);
        return view ('admin.printers.edit', compact('printer', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Printer::findOrFail($id)->update($request->all());
        return redirect()->route('admin.printers.index')->with('success', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Printer::destroy($id);
        return redirect()->route('admin.printers.index')->with('success', 'Record deleted!');
    }
}
