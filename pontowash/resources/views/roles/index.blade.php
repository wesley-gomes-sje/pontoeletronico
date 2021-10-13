@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Permissões</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           @can('criar-cargo')
                            <a href="{{ route('roles.create') }}" class="btn btn-success" style="border:none;box-shadow: none;">Novo <strong>+</strong></a>
                           @endcan
                           <table class="table table-striped mt-2">
                                <thead style="background-color: #FFCE43;">
                                <th style="color: #fff;">Função</th>
                                <th style="color: #fff;">Ações</th>
                                </thead> 
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                            @can('editar-cargo')
                                               <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary">Editar</a>
                                            @endcan

                                            @can('excluir-cargo')

                                                {!! Form::open(['method'=>'DELETE', 'route'=> ['roles.destroy', $role->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Deletar', ['class'=> 'btn btn-danger'])!!}
                                                {!! Form::close()!!}
                                            @endcan
                                            </td>  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

