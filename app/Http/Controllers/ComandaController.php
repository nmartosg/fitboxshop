<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use Illuminate\Pagination\CursorPaginator;

class ComandaController extends Controller
{
    /**
    * Show a list of all of the application's users.
    *
    * @return Response
    */
    public function index() {
        $comandas=Comanda::orderBy('id','ASC')->paginate(5);
        return view('comanda.index',compact('comandas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('comanda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request,[ 
            'precioTotal'=>'required',
            'estadoPedido'=>'required']);
        
        Comanda::create($request->all());

        return redirect()->route('comanda.index')->with('create','Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $comanda=Comanda::find($id);
        
        return view('comanda.show',compact('comandas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $comandas=Comanda::find($id);
        
        return view('comanda.edit',compact('comandas'));
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
        $this->validate($request,[
            'precioTotal'=>'required',
            'estadoPedido'=>'required']);
        
        Comanda::find($id)->update($request->all());
        
        return redirect()->route('comanda.index')->with('update','Cambios efectuados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Comanda::find($id)->delete();
        
        return redirect()->route('comanda.index')->with('delete','Registro eliminado correctamente');
    }
}
