<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-horario|criar-horario|editar-horario|excluir-horario',['only'=>['index']]);
        $this->middleware('permission:criar-horario',['only'=>['create','store']]);
        $this->middleware('permission:editar-horario',['only'=>['edit','update']]);
        $this->middleware('permission:excluir-horario',['only'=>['destroy']]); 
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = DB::table('users')
                           ->join('turnos','users.id','=', 'turnos.idUsuario')
                           ->join('horarios','horarios.id','=', 'turnos.idHora')
                           ->select('turnos.id as id','users.name as nome','horarios.inicial as ini','horarios.final as fim')
                           ->get();
        $horarios = Horario::paginate(8); 
        return view('horarios.index', ['colaboradores'=>$colaboradores,'horarios'=>$horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.cria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'inicial' => 'required'
        ]);
        Horario::create($request->all());
        return redirect()->route('horarios.index');
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
    public function edit(Horario $horario)
    {
        return view('horarios.editar',compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Horario $horario)
    {
        request()->validate([
            'inicial' => 'required'
        ]);
        $horario->update($request->all());
        return redirect()->route('horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index');
    }
}
