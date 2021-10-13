@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Permissão</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

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

                                 {!! Form::model($role, ['method' => 'PUT','route'=> ['roles.update', $role->id]]) !!}
                                
                                 <div class="row">
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                         <div class="form-group">
                                             <label for="name">Permissão</label>
                                             {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                         </div>
                                     </div>
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                         <div class="form-group">
                                             <label for="name">permissões para este papel</label>
                                             <br/>
                                             @foreach($permission as $value)
                                                <label> {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ?? true ) }}
                                                     {{ $value->name }}
                                                </label>
                                                <br/>
                                             @endforeach
                                         </div>
                                     </div>
                                </div>  
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                 {!! Form::close() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

