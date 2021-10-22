<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Horario;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function __construct(User $user, Horario $horario){
        $this->user = $user;
        $this->horario = $horario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->user->orderBy('name', 'ASC')->get();
        $horarios = $this->horario->orderBy('turno', 'ASC')->get();
        return view('turno.criar',['usuarios'=> $usuarios, 'horarios'=> $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new Turno;
        $turno->idUsuario = $request->usuario_id;
        $turno->idHora = $request->horario_id;
        $turno->save();
        #$turno = Turno::create(['idUsuario'=> $request->input('usuario_id')]);
        #$turno = Turno::create(['idHora'=> $request->input('horario_id')]);
        #$turno = Turno::create(['idUsuario'=> $request->input('usuario_id')],['idHora'=> $request->input('horario_id')]);
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
