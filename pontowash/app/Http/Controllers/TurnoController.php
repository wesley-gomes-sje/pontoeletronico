<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Horario;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;

class TurnoController extends Controller
{
    public function __construct(User $user, Horario $horario, Turno $tur){
        $this->user = $user;
        $this->horario = $horario;
        $this->tur = $tur;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = $this->user->orderBy('name', 'ASC')->get();
        $horarios = $this->horario->orderBy('turno', 'ASC')->get();
        return view('turno.criar',['usuarios'=> $usuarios, 'horarios'=> $horarios]);
        
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
        /*$dados = DB::table('turnos')
                     ->join('horarios','turnos.idHora','=','horarios.id')
                     ->select( 'turnos.id as id','horarios.id as idHorario', 'horarios.turno as nTurno')
                     ->get();

       // $idTurno = $this->tur->where('id','=',$id)->first();
        
        //dd($idTurno);
        dd($dados);
        return view('turno.editar',['dados'=>$dados]);*/

        $turno=$this->tur->find($id);
        //dd($turno);
        $horas=$this->horario->all();
        //dd($horas);
        return view('turno.editar',['turno'=> $turno, 'horas'=> $horas]);
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
       // dd($request);
        $this->tur->where(['id'=>$id])->update([
                'idHora'=>$request->idHora
        ]);   
        return redirect()->route('horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('horarios.index');
    }
}
