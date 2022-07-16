<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ver todas las consultas registradas en la base de datos por medio de un metodo get
        $consultas = Consultas::all();
        return response()->json($consultas, 200);

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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultas = new Consultas();
        $consultas->nombre = $request->nombre;
        $consultas->apPaterno = $request->apPaterno;
        $consultas->apMaterno = $request->apMaterno;
        $consultas->fechaConsulta = $request->fechaConsulta;
        $consultas->motivo = $request->motivo;
        $consultas->diagnostico = $request->diagnostico;
        $consultas->tratamiento = $request->tratamiento;
        $consultas->observaciones = $request->observaciones;
        $consultas->save();
        return response()->json($consultas, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $consultas = Consultas::find($id);
        if (!$consultas) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($consultas, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultas $consultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultas $consultas)
    {
        //Buscar la consulta por medio del id y actualizar los datos
        $consultas=Consultas::findOrFail($request->id);
        $consultas->nombre = $request->nombre;
        $consultas->apPaterno = $request->apPaterno;
        $consultas->apMaterno = $request->apMaterno;
        $consultas->fechaConsulta = $request->fechaConsulta;
        $consultas->motivo = $request->motivo;
        $consultas->diagnostico = $request->diagnostico;
        $consultas->tratamiento = $request->tratamiento;
        $consultas->observaciones = $request->observaciones;
        $consultas->save();
        return response()->json($consultas, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $consultas=Consultas::destroy($id);
        return response()->json(['message' => 'Consulta eliminada'], 200);
    }
    
}
