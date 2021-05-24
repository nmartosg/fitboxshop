<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;

class ProducteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productes=Producte::orderBy('id','ASC')->Paginate(5);
        return view('producte.index',compact('productes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producte.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 
            'nom'=>'required',
            'tipos'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
            'img'=>'required',
            'productoCesta'=>'required',
            'comprado'=>'required',]);
         Producte::create($request->all());
         return redirect()->route('producte.index')->with('create','Registro creado correctamente');
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
        $productes=Producte::find($id);
        return view('producte.show',compact('productes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productes=Producte::find($id);
        return view('producte.edit',compact('productes'));
       
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
        //
        $this->validate($request,[ 
            'nom'=>'required',
            'tipos'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
            'img'=>'required',
            'productoCesta'=>'required',
            'comprado'=>'required',]);
            Producte::find($id)->update($request->all());
            return redirect()->route('producte.index')->with('update','Cambios efectuados correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producte::find($id)->delete();
        return redirect()->route('producte.index')->with('delete','Registro eliminado correctamente');

    }
}
