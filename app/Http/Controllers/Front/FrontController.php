<?php

namespace App\Http\Controllers\Front;

use App\Models\Printer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
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
        return view('front', compact('printers'));
    }

    public function printer($id)
    {
        //dd($request->all());
        $printer = Printer::findOrFail($id);
        //dd($printer);
        //dd($printer->getModel->model);

        return view('installprinter', compact('printer'));
    }

    public function installprinter(Request $request, $id)
    {
        $comp = $request->comp;
        //dd($comp);

        $p = Printer::findorfail($id);
        //dd($p);






    }


}
