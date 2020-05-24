<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\ModelPrinter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelPrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models= ModelPrinter::all();
        return view('admin.models.index ', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = ModelPrinter::all();
        return view ('admin.models.create', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->image);
        // по file смотри laravel docs -> find file (basic)

        // в файле config/filesystems.php указаны хранилица (local, public, s3)
        // метод store автоматически создает имя.
            //$image = $request->image->store('images', 'public');
            //dd($image);
        // метод storeAs позволяет указывать имена.

        if ($request->image == null) {
            ModelPrinter::create([
                'model' => $request->model,
                'image' => null,
            ]);
        }
        else {
            if ($request->hasFile('image')) {

                // Определяем расширение:
                $a = $request->image->getClientOriginalExtension();

                // Формируем имя:
                $name = str_replace(' ', '_', $request->model) . ".$a";

                // Сохраняем картинку:
                $request->image->storeAs('images', $name, 'public');

                // Записываем в БД:
                ModelPrinter::create([
                    'model' => $request->model,
                    'image' => $name,
                ]);
            }
            else {
                dd('это не файл!');
            }
        }

        return redirect()->route('admin.models.index')->with('success', 'Record created!');
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
        $model = ModelPrinter::findOrFail($id);
        //dd($model);
        return view ('admin.models.edit', compact( 'model'));
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
        if($request->image == null) {
            ModelPrinter::findOrFail($id)->update([
              'model' => $request->model
            ]);
        }
        else {

            //dd(ModelPrinter::findOrFail($id)->image);
            if (!ModelPrinter::findOrFail($id)->image == null) {

                //dd('/storage/images/'. ModelPrinter::findOrFail($id)->image);
               \Storage::delete('/public/images/'. ModelPrinter::findOrFail($id)->image);
            }

            if ($request->hasFile('image')) {

                // Определяем расширение:
                $a = $request->image->getClientOriginalExtension();

                // Формируем имя:
                $name = str_replace(' ', '_', $request->model) . ".$a";

                // сохраняем картинку:
                $request->image->storeAs('images', $name, 'public');

                // записываем в БД:
                ModelPrinter::findOrFail($id)->update([
                    'model' => $request->model,
                    'image' => $name,
                ]);
            }
            else {
                dd('это не файл!');
            }
        }

        return redirect()->route('admin.models.index')->with('success', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelPrinter::destroy($id);
        return redirect()->route('admin.models.index')->with('success', 'Record deleted!');
    }

    public function removeImage($id) {
        dd($id);
    }

}
