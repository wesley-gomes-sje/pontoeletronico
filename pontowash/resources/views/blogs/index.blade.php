@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Recados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                           @can('criar-recado')
                            <a href="{{ route('blog.create') }}" class="btn btn-success" style="border:none;box-shadow: none;" >Novo <strong>+</strong></a>
                           @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #FFCE43;">
                                <th style="display: none;">ID</th>
                                <th style="color: #000;">Titulo</th>
                                <th style="color: #000;">Conteudo</th>
                                <th style="color: #000;">Ações</th>
                                </thead> 
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td style="display:none;">{{$blog->id}}</td>
                                            <td>{{$blog->titulo}}</td>
                                            <td>{{$blog->conteudo}}</td>
                                            <td>
                                                <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                                    @can('editar-recado')
                                                    <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-info">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('excluir-recado')
                                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $blogs->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection