@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Jornada</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="align-items: center">
                        <div class="card-body" style="background-color: black; border-radius: 12px;">

                                 @if ($errors->any())
                                 <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                     <strong>Confira os campos!!</strong>
                                     @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                     @endforeach
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 @endif
                                   
                                    <form action="{{ route('turno.update',$turno->id) }}" method="POST">
                                     @csrf
                                     @method('PUT')
                                     <div class="row">
                                         <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="titulo">Turno</label><br>
                                                <select name="idHora" id="idHora" class="form-control">
                                                    <option value="">Selecione</option>  
                                                    @foreach($horas as $hora)
                                                        <option value="{{$hora->id}}">{{$hora->turno}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                        </div>
                                         <br>
                                         <button type="submit" class="btn btn-primary" style="width: 100%">Salvar</button>
                                     </div>
                                 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection