@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <a href="/usuarios" class="text-white">
                                <div class="col-md-4 col-xl-4">
                                    
                                    <div class="card bg-c-blue order-card">
                                            <div class="card-blok">
                                                <h5>Colaboradores</h5>
                                                @php
                                                use App\Models\User;
                                                $qtdusers = User::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$qtdusers}}</span></h2>
                                                <p class="m-b-o text-right"><a href="/usuarios" class="text-white">Ver Mais</a></p>
                                            </div>
                                    </div>
                                    
                                 </div>
                            </a>
                            <a href="/roles" class="text-white">
                                 <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-blok">
                                            <h5>Permissões</h5>
                                            @php
                                            use Spatie\Permission\Models\Role;
                                            $qtdpermisson = Role::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fas fa-user-lock f-left"></i><span>{{$qtdpermisson}}</span></h2>
                                            <p class="m-b-o text-right"><a href="/roles" class="text-white">Ver Mais</a></p>
                                        </div>
                                    </div>
                                 </div>
                            </a>
                            <a href="/blog" class="text-white">
                                 <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-blok">
                                            <h5>Recados</h5>
                                            @php
                                            use App\Models\Blog;
                                            $qtdblog = Blog::count();
                                            @endphp
                                            <h2 class="text-right"> <i class=" fas fa-envelope f-left"></i><span>{{$qtdblog}}</span></h2>
                                            <p class="m-b-o text-right"><a href="/blog" class="text-white">Ver Mais</a></p>
                                        </div>
                                    </div>
                                 </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-blok">
                                            <h5>Relatórios</h5>
                                            <h2 class="text-right"><i class="fas fa-chart-line f-left"></i><span>3</span></h2>
                                            <p class="m-b-o text-right"><a href="/usuarios" class="text-white">Ver Mais</a></p>
                                        </div>
                                    </div>
                                 </div>

                                 <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-orange order-card">
                                        <div class="card-blok">
                                            <h5>Horários</h5>
                                            
                                            <h2 class="text-right"><i class="fas fa-clock f-left"></i><span>2</span></h2>
                                            <p class="m-b-o text-right"><a href="/usuarios" class="text-white">Ver Mais</a></p>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection


