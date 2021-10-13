@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Recado</h3>
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

                                 <form action="{{ route('blog.update',$blog->id) }}" method="POST">
                                     @csrf
                                     @method('PUT')
                                     <div class="row">
                                         <div class="col-xs-12 col-sm-12 col-md-12">
                                             <div class="form-group">
                                                 <label for="titulo">Titulo</label>
                                                 <input type="text" name="titulo" class="form-control" value="{{ $blog->titulo }}">
                                             </div>
                                         </div>
                                         <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-floating">
                                                <label for="conteudo">Conteúdo</label>
                                                <textarea name="conteudo" style="height: 100px" class="form-control">{{ $blog->conteudo }}</textarea>
                                            </div>
                                         </div>
                                         <br>
                                         <button type="submit" class="btn btn-primary">Salvar</button>
                                     </div>
                                 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

