@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Colaboradores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('criar-cargo')
                            <a href="{{ route('usuarios.create') }}" class="btn btn-success" style="border:none;box-shadow: none;" >Novo <strong>+</strong></a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #FFCE43;">
                                <th style="display: none;">ID</th>
                                <th style="color: #000;">Nome</th>
                                <th style="color: #000;">Email</th>
                                <th style="color: #000;">Privilégio</th>
                                <th style="color: #000;">Ações</th>
                                </thead> 
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td style="display:none;">{{$usuario->id}}</td>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @can('criar-cargo')
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info" >Editar</a>
                                                
                                                {!! Form::open(['method'=>'DELETE', 'route'=> ['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}

                                                    {!! Form::submit('Deletar', ['class'=> 'btn btn-danger'])!!}

                                                {!! Form::close()!!} 
                                                @endcan
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection