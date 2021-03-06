<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*use App\Http\Request;*/
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\ColeccionFormRequest;

//use App\Categoria;
use App\categoria;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $caters = DB::select('select categoria from categorias ');
        $autos = DB::select('select auto ,categoria,cv from autos where id = :id and publico =:dat' , ['id' => $id, 'dat' => true]);
        return view('Coleccion', ['caters' => $caters ,'autos' => $autos ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * quedo la implementacion para agregar las categorias pero
     *  por decision de implementacion se estrablecieron 3 categorias por defecto
     * por lo que no se realizan los chequeos de autenticacion
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->input('name')))
        {
            $categoria=new categoria();//nuestro modelo
            $categoria->categoria=$request->input('name');
            $categoria->save();
        }
       return redirect('/home');
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
        //
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
    }
}
