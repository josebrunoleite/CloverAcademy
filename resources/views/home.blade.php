@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">{{ __('Dashboard') }}</h1> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">
                                Bem Vindo! {{ Auth::user()->name }}, você veio no lugar certo para fazer um curso!<br>
                                Aqui é o lugal aonde o filho chora e a mãe não vê, aqui é o lugar aonde você vai aprender a
                                esconder seu choro e tentar algo de ultil na sua vida!
                            </p>
                            <div>
                                <img src="https://media.discordapp.net/attachments/980565925235425360/1156326987829350412/image.png?ex=651490ed&is=65133f6d&hm=82437eaa5d1a3be8fafe4105d5b0b81221194c1023be5259437fd04e64b4b35f&="
                                    alt="" class="img-fluid">
                            </div>
                            <p>Venha conhecer a nossas loucuras e aprender a se torna pessoas uteis para sociedade! Bem
                                vindo a escola {{ config('app.name', 'Laravel') }}</p>
                            <p class="fs-3">Não se esqueçam, que a resposta de qualquer pergunta é <strong> SL</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
