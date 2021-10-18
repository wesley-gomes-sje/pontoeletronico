@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Horarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           @can('criar-horario')
                            <a href="{{ route('horarios.create') }}" class="btn btn-success" style="border:none;box-shadow: none;">Cadastrar horario  <strong>+</strong></a>
                           @endcan
                           <table class="table table-striped mt-2">
                                <thead style="background-color: #FFCE43;">
                                <th style="color: #000;">Turno</th>
                                <th style="color: #000;">Horario Inicial</th>
                                <th style="color: #000;">Horario Final</th>
                                <th style="color: #000;">Ações</th>
                                </thead> 
                                <tbody>
                                </tbody>
                                @foreach($horarios as $horario)
                                        <tr>
                                            <td style="display:none;">{{$horario->id}}</td>
                                            <td>{{$horario->turno}}</td>
                                            <td>{{$horario->inicial}}</td>
                                            <td>{{$horario->final}}</td>
                                            <td>
                                                <form action="{{ route('horarios.destroy',$horario->id) }}" method="POST">
                                                    @can('editar-horario')
                                                    <a href="{{ route('horarios.edit',$horario->id) }}" class="btn btn-info">Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('excluir-horario')
                                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                            </table>
                            <div class="pagination justify-content-end">
                                {!! $horarios->links() !!}
                            </div>
                            <br>

                            @can('criar-horario')
                            <a href="" class="btn btn-primary" style="border:none;box-shadow: none;">Adicionar Colaborador <strong>+</strong></a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #FFCE43;">
                                <th style="color: #000;">Colaborador</th>
                                <th style="color: #000;">Função</th>
                                <th style="color: #000;">Horario Inicial</th>
                                <th style="color: #000;">Horario Final</th>
                                </thead> 
                                <tbody>
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $horarios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
