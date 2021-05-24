<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class CuentaController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
        return view('cuenta');
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('user.create');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
    
        $this->validate($request,[ 
            'name'=>'required',
            'dni'=>'required',
            'primerapellido'=>'required',
            'segundoapellido'=>'required',
            'email'=>'required',
            'rol'=>'required']);
    
        User::create($request->all());
   
        return redirect()->route('user.index')->with('success','Registro creado correctamente');
    }
    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $users=User::find($id);
        
        return view('user.show',compact('users'));
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $users=User::find($id);
        
        return view('cuentaedit');
    }
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {

    $this->validate($request,[ 
        'name'=>'required',
        'dni'=>'required',
        'primerapellido'=>'required',
        'segundoapellido'=>'required',
        'email'=>'required',
        'rol'=>'required']);
    
        User::find($id)->update($request->all());
   
        return redirect()->route('cuenta')->with('success','Cambios efectuados correctamente');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        User::find($id)->delete();
    
        return redirect()->route('cuenta')->with('delete','Registro eliminado correctamente');
    }
   


}

